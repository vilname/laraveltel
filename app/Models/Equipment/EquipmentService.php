<?php

namespace App\Models\Equipment;

use App\Models\Equipment;
use App\Models\Equipment\Validators\StoreValidate;
use App\Models\TypeEquipment\TypeEquipmentRepository;
use Illuminate\Http\Request;

class EquipmentService
{
    /**
     * карта возможных вариантов маски
     *
     * @param $letter
     * @return string
     */
    public function mapRegExp($letter): string
    {
        $map = [
            'N' => '(\d)',
            'A' => '[(A-Z)]',
            'a' => '[(a-z)]',
            'X' => '([a-z0-9])',
            'Z' => '(_|-|@)'
        ];

        return $map[$letter];
    }

    /**
     * готовая строка для регулярного выражения
     *
     * @param string $codeType
     * @return string
     */
    public function createMapRegExp(string $codeType): string
    {
        $regStr = '/^';

        foreach (str_split($codeType) as $letter) {
            $regStr .= $this->mapRegExp($letter);
        }

        return $regStr . '/';
    }

    public function getRegExpMask(string $codeType): string
    {
        $typeEquipmentRepository = new TypeEquipmentRepository();

        $typeEquipment = $typeEquipmentRepository->getByEquipmentType($codeType);
        return $this->createMapRegExp($typeEquipment->first()->serial_number_mask);
    }
}
