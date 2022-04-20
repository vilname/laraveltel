<?php


namespace App\Models\TypeEquipment;


use App\Models\TypeEquipment;

class TypeEquipmentRepository
{
    public function getByEquipmentType(string $code)
    {
        return TypeEquipment::query()->find(['code' => $code]);
    }
}
