<?php

namespace App\Models\TypeEquipment;

use App\Models\Interfaces\DtoInterface;
use App\Models\TypeEquipment\Dto\TypeEquipmentDto;
use Illuminate\Database\Eloquent\Builder;

class TypeEquipmentService
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
        /** @var TypeEquipmentDto $dto */
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
