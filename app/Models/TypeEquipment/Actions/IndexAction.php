<?php

namespace App\Models\TypeEquipment\Actions;

use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;
use App\Models\TypeEquipment;
use App\Models\TypeEquipment\TypeEquipmentService;

class IndexAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        try {
            $query = TypeEquipment::query();
            $typeEquipmentService = new TypeEquipmentService();
            $equipmentResult = $typeEquipmentService->scopeEquipment($query, $dto)->paginate(5);
        } catch (\Exception $e) {
            return new ErrorResource(['message' => 'Ошибка получения данных']);
        }

        return new SuccessResource(['data' => $equipmentResult]);
    }
}
