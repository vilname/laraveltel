<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\EquipmentType\Actions\IndexAction;
use App\Models\EquipmentType\Dto\EquipmentTypeDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    /**
     * Получение всех записей
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $action = new IndexAction();
        $result = $action->execute(EquipmentTypeDto::map($request->all()));

        return response()->json($result);
    }

}
