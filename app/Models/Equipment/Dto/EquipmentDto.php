<?php

namespace App\Models\Equipment\Dto;

use App\Models\Interfaces\DtoInterface;

class EquipmentDto implements DtoInterface
{
    public ?string $code;
    public ?string $codeType;
    public ?string $serialNumber;
    public ?string $note;

    public static function map(array $data): DtoInterface
    {
        $o = new self();

        $o->code = $data['code'];
        $o->codeType = $data['code_type'];
        $o->serialNumber = $data['serial_number'];
        $o->note = $data['note'];

        return $o;
    }
}
