<?php

namespace App\Models\Equipment\Dto;

use App\Models\Interfaces\DtoInterface;

class UpdateDto implements DtoInterface
{
    public $code;
    public $codeType;
    public $serialNumber;
    public $note;

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
