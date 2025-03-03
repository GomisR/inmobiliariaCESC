<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PisoController;
use Illuminate\Support\Facades\Route;

//INDEX
Route::get('/', function () {
    return view('index');
})->name('index') ;
//INICIO SESION
Route::get("login", function () {
    return view('login');
})->name('login')->middleware('guest');

//PISOS
Route::get("calleConstitucion1", function () {
    return view('calleConstitucion1');
})->name('calleConstitucion1');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';

Route::resource("observaciones", ObservacionesController::class);
Route::post('/contacto', [ObservacionesController::class, 'store'])->name('For');


//Pisos
Route::get('pisos', [PisoController::class, 'index'])->name('pisos.index');

Route::resource("pisos", PisoController::class);
