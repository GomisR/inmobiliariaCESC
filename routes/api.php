<?php
use App\Http\Controllers\Api\PisoController;
use Illuminate\Routing\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas de la API para pisos
Route::get('pisos', [PisoController::class, 'index']);
Route::get('pisos/{id}', [PisoController::class, 'show']);
Route::post('pisos', [PisoController::class, 'store']);
Route::put('pisos/{id}', [PisoController::class, 'update']);
Route::delete('pisos/{id}', [PisoController::class, 'destroy']);
