<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('categorias', CategoriaController::class);
});
Route::get('/register', [RegistroController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegistroController::class, 'register']);