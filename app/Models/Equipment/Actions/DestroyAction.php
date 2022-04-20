<?php


namespace App\Models\Equipment\Actions;


use App\Models\Equipment;
use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\SuccessResource;

class DestroyAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        $equipmentModel = Equipment::query()->find($dto->code);
        $equipmentModel->delete();
        return new SuccessResource(['data' => 'Успешно удален']);
    }
}
