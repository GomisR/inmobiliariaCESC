<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\formularioController;
use App\Http\Controllers\MainController;

use Illuminate\Support\Facades\Route;

//INDEX
Route::get('/', function () {
    return view('index');
})->name('index') ;
//INICIO SESION
Route::get("login", function () {
    return view('login');
})->name('login');

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
Route::view("favoritos","index")->name('favoritos');
require __DIR__.'/auth.php';
