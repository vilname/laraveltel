<?php


namespace App\Models\Equipment;


use App\Models\Equipment;

class EquipmentRepository
{
    public function save(Equipment $equipmentModel,array $items): Equipment
    {
        $equipmentModel->code = $items['code'];
        $equipmentModel->codeType = $items['code_type'];
        $equipmentModel->serialNumber = $items['serial_number'];
        $equipmentModel->note = $items['note'];

        $equipmentModel->save();

        return $equipmentModel;
    }

    public function getByCode(int $id): Equipment
    {
        return Equipment::query()->find(['code' => $id])->first();
    }
}
