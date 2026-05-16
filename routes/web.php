<?php

use App\Http\Controllers\LoginController;
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

//ruta publicas de acceso

Route::get('/', [LoginController::class, 'showLogin'])->name('showLogin');
Route::post('/login/validate', [LoginController::class, 'login'])->name('login.post');
