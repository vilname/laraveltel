<?php


namespace App\Models\Equipment\Dto;


use App\Models\Interfaces\DtoInterface;

class ShowDto implements DtoInterface
{
    public $code;

    public static function map($data): DtoInterface
    {
        $o = new self();

        $o->code = $data;

        return $o;
    }
}
