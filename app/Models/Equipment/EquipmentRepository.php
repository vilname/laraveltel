<?php

namespace App\Models\Equipment;

use App\Models\Equipment;

class EquipmentRepository
{
    /**
     * @param Equipment $equipmentModel
     * @param array $items
     * @return Equipment
     */
    public function save(Equipment $equipmentModel,array $items): Equipment
    {
        $equipmentModel->code = $items['code'];
        $equipmentModel->codeType = $items['code_type'];
        $equipmentModel->serialNumber = $items['serial_number'];
        $equipmentModel->note = $items['note'];

        $equipmentModel->save();

        return $equipmentModel;
    }

    /**
     * @param int $id
     * @return Equipment
     */
    public function getByCode(int $id): Equipment
    {
        return Equipment::query()->find(['code' => $id])->first();
    }

}
