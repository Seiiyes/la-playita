<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistroController;
use App\Http\Controllers\Admin\UsuarioRolController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware('guest')->group(function () {
   
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');


    Route::post('/login', [LoginController::class, 'login'])->name('login'); 

   
    Route::get('/register', [RegistroController::class, 'showRegistrationForm'])->name('register');

   
    Route::post('/register', [RegistroController::class, 'register']);
});


Route::middleware('auth')->group(function () {
   
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

   
    Route::resource('productos', ProductoController::class);

    
    Route::resource('categorias', CategoriaController::class);
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/usuarios', [UsuarioRolController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios/{id}/rol', [UsuarioRolController::class, 'actualizarRol'])->name('usuarios.actualizarRol');
});
