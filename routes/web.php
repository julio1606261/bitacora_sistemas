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

Route::get('/departamentos', [DepartamentosController::class, 'index'])->name('departamentos')->middleware('LoginMiddleware');
Route::post('/departamentos/agregar', [DepartamentosController::class, 'agregar'])->name('agregar_departamentos');
Route::get('/departamentos/editar/{id}', [DepartamentosController::class, 'editar_view'])->name('editar_departamentos_view');
Route::put('/departamentos/editar', [DepartamentosController::class, 'editar'])->name('editar_departamentos');

Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
Route::post('/usuarios/agregar', [UsuariosController::class, 'agregar'])->name('agregar_usuarios');
Route::get('/usuarios/editar/{id}', [UsuariosController::class, 'editar_view'])->name('editar_usuarios_view');
Route::put('/usuarios/editar', [UsuariosController::class, 'editar'])->name('editar_usuarios');


Route::get('/bitacora', [BitacoraController::class, 'index'])->name('bitacora')/* ->middleware('adminAuth') */;
Route::post('/bitacora', [BitacoraController::class, 'agregar'])->name('agregar_bitacora')/* ->middleware('adminAuth') */;
Route::get('/bitacora/editar/{id}', [BitacoraController::class, 'editar_view'])->name('editar_bitacora_view')/* ->middleware('adminAuth') */;
Route::put('/bitacora/editar', [BitacoraController::class, 'editar'])->name('editar_bitacora')/* ->middleware('adminAuth') */;
Route::get('/bitacora/detalles/{id}', [BitacoraController::class, 'detalles_view'])->name('detalles_bitacora_view')/* ->middleware('adminAuth') */;

Route::get('/reportes', [ReportesController::class, 'index'])->name('reportes')/* ->middleware('adminAuth') */;

Route::get('/', [LoginController::class, 'index'])/* ->middleware('adminAuth') */;
Route::get('/login', [LoginController::class, 'index'])->name('login')/* ->middleware('adminAuth') */;
Route::post('/login', [LoginController::class, 'login'])->name('login_store')/* ->middleware('adminAuth') */;
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');