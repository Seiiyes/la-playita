<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;

// Página principal (Home)
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas solo para usuarios no autenticados
Route::middleware('guest')->group(function () {
    // Formulario de inicio de sesión
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    // Procesar inicio de sesión
    Route::post('/login', [LoginController::class, 'login'])->name('login'); // ← importante usar este nombre

    // Formulario de registro
    Route::get('/register', [RegistroController::class, 'showRegistrationForm'])->name('register');

    // Procesar registro
    Route::post('/register', [RegistroController::class, 'register']);
});

// Rutas solo para usuarios autenticados
Route::middleware('auth')->group(function () {
    // Cerrar sesión
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // CRUD de productos
    Route::resource('productos', ProductoController::class);

    // CRUD de categorías
    Route::resource('categorias', CategoriaController::class);
});
