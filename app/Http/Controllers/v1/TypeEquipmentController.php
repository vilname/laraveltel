<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\TypeEquipment\Actions\IndexAction;
use App\Models\TypeEquipment\Dto\TypeEquipmentDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TypeEquipmentController extends Controller
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
        $result = $action->execute(TypeEquipmentDto::map($request->all()));

        return response()->json($result);
    }

}
