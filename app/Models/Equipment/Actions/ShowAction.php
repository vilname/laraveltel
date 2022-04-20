<?php


namespace App\Models\Equipment\Actions;


use App\Models\Equipment\EquipmentRepository;
use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;

class ShowAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        $equipmentRepository = new EquipmentRepository();
        $equipment = $equipmentRepository->getByCode($dto->code);
        if (!$equipment) {
            return new ErrorResource(['message' => 'Оборудование не обнаружено']);
        }

        return new SuccessResource(['data' => $equipment]);
    }
}
