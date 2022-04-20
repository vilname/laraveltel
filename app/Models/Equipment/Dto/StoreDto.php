<?php


namespace App\Models\Equipment\Dto;


use App\Models\Interfaces\DtoInterface;

class StoreDto implements DtoInterface
{
    public $equipments;

    public static function map($data): DtoInterface
    {
        $o = new self();

        $o->equipments = $data;

        return $o;
    }
}
