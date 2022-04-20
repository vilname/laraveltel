<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\Equipment\Actions\DestroyAction;
use App\Models\Equipment\Actions\ShowAction;
use App\Models\Equipment\Actions\StoreAction;
use App\Models\Equipment\Actions\UpdateAction;
use App\Models\Equipment\Dto\DestroyDto;
use App\Models\Equipment\Dto\ShowDto;
use App\Models\Equipment\Dto\StoreDto;
use App\Models\Equipment\Dto\UpdateDto;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {
        $action = new StoreAction();
        return $action->execute(StoreDto::map($request->json()));
    }


    public function show($code)
    {
        $action = new ShowAction();
        return $action->execute(ShowDto::map($code));
    }


    public function edit($id)
    {

    }


    public function update(Request $request, $code)
    {
        $action = new UpdateAction();
        return $action->execute(UpdateDto::map(array_merge([
            $request->all(),
            $code
        ])));
    }

    public function destroy($id)
    {
        $action = new DestroyAction();
        return $action->execute(DestroyDto::map($id));
    }
}
