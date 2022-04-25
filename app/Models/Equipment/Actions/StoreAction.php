<?php

namespace App\Models\Equipment\Actions;

use App\Models\Equipment;
use App\Models\Equipment\EquipmentRepository;
use App\Models\Equipment\EquipmentService;
use App\Models\Equipment\Validators\StoreValidate;
use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;

class StoreAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        $equipmentService = new EquipmentService();
        $equipmentRepository = new EquipmentRepository();
        $equipmentModel = new Equipment();

        $result = [];
        foreach ($dto->equipments as $equipment) {
            try {
                StoreValidate::validate($equipment, $equipmentService->getRegExpMask($equipment['code_type']));
                $equipment = $equipmentRepository->save($equipmentModel, $equipment);

                $result['success'] = $equipment->id;
            } catch (\Exception $e) {
                $result['error'] = $e->getMessage();
            }
        }

        if ($result['error']) {
            return new ErrorResource(['message' => $result['error']]);
        }

        return new SuccessResource(['data' => [
            'equipment_id' => $result['success']
        ]]);
    }
}
