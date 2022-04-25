<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\Equipment\Actions\DestroyAction;
use App\Models\Equipment\Actions\IndexAction;
use App\Models\Equipment\Actions\ShowAction;
use App\Models\Equipment\Actions\StoreAction;
use App\Models\Equipment\Actions\UpdateAction;
use App\Models\Equipment\Dto\DestroyDto;
use App\Models\Equipment\Dto\ShowDto;
use App\Models\Equipment\Dto\StoreDto;
use App\Models\Equipment\Dto\EquipmentDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Получение все данных
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $action = new IndexAction();
        $result = $action->execute(EquipmentDto::map($request->all()));

        return response()->json($result);
    }

    /**
     * Сохранение
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $action = new StoreAction();
        $result = $action->execute(StoreDto::map($request->json()));

        return response()->json($result);
    }

    /**
     * Получение одного элемента
     *
     * @param $code
     * @return JsonResponse
     */
    public function show($code): JsonResponse
    {
        $action = new ShowAction();
        $result = $action->execute(ShowDto::map($code));

        return response()->json($result);
    }

    /**
     * Изменение
     *
     * @param Request $request
     * @param $code
     * @return JsonResponse
     */
    public function update(Request $request, $code): JsonResponse
    {
        $action = new UpdateAction();
        $result = $action->execute(EquipmentDto::map(array_merge([
            $request->all(),
            compact($code)
        ])));

        return response()->json($result);
    }

    /**
     * Удаление
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $action = new DestroyAction();
        $result = $action->execute(DestroyDto::map($id));

        return response()->json($result);
    }
}
