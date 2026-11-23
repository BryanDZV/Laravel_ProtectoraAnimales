<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 1. Rutas públicas de acceso
Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login/validate', [LoginController::class, 'login'])->name('login.post');

// 2. Rutas protegidas (Requieren estar autenticado)
Route::middleware(['auth'])->group(function () {

    // Rutas comunes para cualquier usuario autenticado (ej. Inicio, Logout)
    // Route::get('/inicio', [HomeController::class, 'index'])->name('inicio');
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // 3. Rutas específicas por Rol usando tu middleware 'rol'
    // Como tu middleware recibe un parámetro ($role), le pasamos el rol con dos puntos: 'rol:admin'

    // SOLO ADMIN
    Route::middleware(['role:administrador'])->group(function () {
        // Aquí pones los recursos completos o rutas exclusivas de admin
        // Route::resource('animales', AnimalController::class);
        // Route::resource genera automáticamente index, create, store, show, edit, update, destroy
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin');
    });

    // SOLO CIUDADOR
    Route::middleware(['role:cuidador'])->group(function () {
        // Aquí pones rutas   exclusivas de empleados
        // Route::get('/mis-tareas', [TareaController::class, 'index'])->name('tareas.index');
        Route::get('/cuidador/dashboard', [DashboardController::class, 'cuidador'])->name('cuidador');
    });
    //veterinario

    Route::middleware(['role:veterinario'])->group(function () {
        Route::get('/veterinario/dashboard', [DashboardController::class, 'veterinario'])->name('veterinario');
    });
});
