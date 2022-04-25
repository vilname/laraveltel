<?php

namespace App\Models\EquipmentType\Actions;

use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;
use App\Models\EquipmentType;
use App\Models\EquipmentType\EquipmentTypeService;

class IndexAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        try {
            $query = EquipmentType::query();
            $equipmentTypeService = new EquipmentTypeService();
            $equipmentResult = $equipmentTypeService->scopeEquipment($query, $dto)->paginate(5);
        } catch (\Exception $e) {
            return new ErrorResource(['message' => 'Ошибка получения данных']);
        }

        return new SuccessResource(['data' => $equipmentResult]);
    }
}
