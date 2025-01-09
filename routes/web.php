<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\LoginMiddleware;

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(LoginMiddleware::class);

Route::get('/departamentos', [DepartamentosController::class, 'index'])->name('departamentos')->middleware(LoginMiddleware::class);
Route::post('/departamentos/agregar', [DepartamentosController::class, 'agregar'])->name('agregar_departamentos')->middleware(LoginMiddleware::class);
Route::get('/departamentos/editar/{id}', [DepartamentosController::class, 'editar_view'])->name('editar_departamentos_view')->middleware(LoginMiddleware::class);
Route::put('/departamentos/editar', [DepartamentosController::class, 'editar'])->name('editar_departamentos')->middleware(LoginMiddleware::class);

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios')->middleware(LoginMiddleware::class);
Route::post('/usuarios/agregar', [UsuariosController::class, 'agregar'])->name('agregar_usuarios')->middleware(LoginMiddleware::class);
Route::get('/usuarios/editar/{id}', [UsuariosController::class, 'editar_view'])->name('editar_usuarios_view')->middleware(LoginMiddleware::class);
Route::put('/usuarios/editar', [UsuariosController::class, 'editar'])->name('editar_usuarios')->middleware(LoginMiddleware::class);


Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora')->middleware(LoginMiddleware::class);
Route::post('/bitacora', [BitacoraController::class, 'agregar'])->name('agregar_bitacora')->middleware(LoginMiddleware::class);
Route::get('/bitacora/editar/{id}', [BitacoraController::class, 'editar_view'])->name('editar_bitacora_view')->middleware(LoginMiddleware::class);
Route::put('/bitacora/editar', [BitacoraController::class, 'editar'])->name('editar_bitacora')->middleware(LoginMiddleware::class);
Route::get('/bitacora/detalles/{id}', [BitacoraController::class, 'detalles_view'])->name('detalles_bitacora_view')->middleware(LoginMiddleware::class);

Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes')->middleware(LoginMiddleware::class);

Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login_store');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');