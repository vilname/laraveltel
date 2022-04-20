<?php

namespace App\Models\TypeEquipment\Dto;

use App\Models\Interfaces\DtoInterface;

class TypeEquipmentDto implements DtoInterface
{
    public string $code;
    public string $type;
    public string $serialNumberMask;

    public static function map(array $data): DtoInterface
    {
        $o = new self();

        $o->code = $data['code'];
        $o->type = $data['type'];
        $o->serialNumberMask = $data['serial_number_mask'];

        return $o;
    }
}
