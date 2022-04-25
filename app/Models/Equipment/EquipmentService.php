<?php

namespace App\Models\Equipment;

use App\Models\Interfaces\DtoInterface;
use App\Models\EquipmentType\EquipmentTypeRepository;
use App\Models\Equipment\Dto\EquipmentDto;
use Illuminate\Database\Eloquent\Builder;

class EquipmentService
{
    /**
     * Карта возможных вариантов маски
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
     * Готовая строка для регулярного выражения
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

    /**
     * Отдает по маске строку регулярного выражения
     *
     * @param string $codeType
     * @return string
     */
    public function getRegExpMask(string $codeType): string
    {
        $equipmentTypeRepository = new EquipmentTypeRepository();

        $equipmentType = $equipmentTypeRepository->getByEquipmentType($codeType);
        return $this->createMapRegExp($equipmentType->first()->serial_number_mask);
    }

    /**
     * Расширяю фильтра запроса к базе
     *
     * @param Builder $query
     * @param DtoInterface $dto
     * @return Builder
     */
    public function scopeEquipment(Builder $query, DtoInterface $dto): Builder
    {
        /** @var EquipmentDto $dto */
        if ($dto->code) {
            $query->where('code', $dto->code);
        }

        if ($dto->codeType) {
            $query->where('code_type', $dto->codeType);
        }

        if ($dto->serialNumber) {
            $query->where('serial_number', $dto->serialNumber);
        }

        if ($dto->note) {
            $query->where('serial_number', 'like', "%$dto->serialNumber%");
        }

        return $query;
    }
}
