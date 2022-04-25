<?php


namespace App\Models\EquipmentType;


use App\Models\EquipmentType;

class EquipmentTypeRepository
{
    public function getByEquipmentType(string $code)
    {
        return EquipmentType::query()->find(['code' => $code]);
    }
}
