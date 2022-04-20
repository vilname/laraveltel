<?php

namespace App\Models\Equipment\Actions;

use App\Models\Equipment;
use App\Models\Equipment\EquipmentService;
use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;

class IndexAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        try {
            $query = Equipment::query();
            $equipmentService = new EquipmentService();
            $equipmentResult = $equipmentService->scopeEquipment($query, $dto)->paginate(5);
        } catch (\Exception $e) {
            return new ErrorResource(['message' => 'Ошибка получения данных']);
        }

        return new SuccessResource(['data' => $equipmentResult]);
    }
}
