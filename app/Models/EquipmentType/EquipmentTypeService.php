<?php

namespace App\Models\EquipmentType;

use App\Models\Interfaces\DtoInterface;
use App\Models\EquipmentType\Dto\EquipmentTypeDto;
use Illuminate\Database\Eloquent\Builder;

class EquipmentTypeService
{
    /**
     * Расширяю фильтра запроса к базе
     *
     * @param Builder $query
     * @param DtoInterface $dto
     * @return Builder
     */
    public function scopeEquipment(Builder $query, DtoInterface $dto): Builder
    {
        /** @var EquipmentTypeDto $dto */
        if ($dto->code) {
            $query->where('code', $dto->code);
        }

        if ($dto->type) {
            $query->where('code_type', $dto->type);
        }

        if ($dto->serialNumberMask) {
            $query->where('serial_number', $dto->serialNumberMask);
        }

        return $query;
    }
}
