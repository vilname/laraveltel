<?php


namespace App\Models\Equipment\Actions;


use App\Models\Equipment\EquipmentRepository;
use App\Models\Equipment\EquipmentService;
use App\Models\Equipment\Validators\StoreValidate;
use App\Models\Interfaces\ApiResult;
use App\Models\Interfaces\DtoInterface;
use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;

class UpdateAction implements ApiResult
{
    public function execute(DtoInterface $dto)
    {
        $equipmentService = new EquipmentService();
        $equipmentRepository = new EquipmentRepository();

        $equipmentModel = $equipmentRepository->getByCode($dto->code);
        if (!$equipmentModel) {
            return new ErrorResource(['message' => 'Оборудование не обнаружено']);
        }

        StoreValidate::validate([
            'code' => $dto->code,
            'code_type' => $dto->codeType,
            'serial_number' => $dto->serialNumber
        ], $equipmentService->getRegExpMask($dto->codeType));

        $equipment = $equipmentRepository->save(
            $equipmentModel,
            [
                'code_type' => $dto->codeType,
                'serial_number' => $dto->serialNumber,
                'note' => $dto->note
            ]
        );

        return new SuccessResource(['data' => $equipment]);
    }
}
