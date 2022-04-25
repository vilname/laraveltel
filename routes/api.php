<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\EquipmentController;
use App\Http\Controllers\v1\TypeEquipmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('auth', [UserController::class, 'auth'])->name('auth');

Route::middleware(['auth:api'])->group(function() {
    Route::post('equipment', [EquipmentController::class, 'store'])->name('equipment_store');
    Route::get('equipment', [EquipmentController::class, 'index'])->name('equipment_index');
    Route::get('equipment/{code}', [EquipmentController::class, 'show'])->name('equipment_show');
    Route::put('equipment/{code}', [EquipmentController::class, 'update'])->name('equipment_update');

    Route::get('equipment', [TypeEquipmentController::class, 'index'])->name('equipment_index');
});
