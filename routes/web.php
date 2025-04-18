<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ReservaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Inicio

Route::get('/sistema-reservas/home', [HomeController::class, 'index'])->name('home');

//Vista de Clientes

Route::get('/sistema-reservas/vista', [ClienteController::class, 'index'])->name('vista');

Route::get('/sistema-reservas/crear', [ClienteController::class, 'create'])->name('crear');

Route::post('/sistema-reservas/vista', [ClienteController::class, 'store'])->name('lista');

Route::get('/sistema-reservas/mostrar/cliente/{cliente}', [ClienteController::class, 'show'])->name('mostrar');

Route::get('/sistema-reservas/editar/cliente/{cliente}', [ClienteController::class, 'edit'])->name('editar');

Route::put('/sistema-reservas/mostrar/cliente/{cliente}', [ClienteController::class, 'update'])->name('actualizar');

Route::get('/sistema-reservas/eliminar/cliente/{cliente}', [ClienteController::class, 'aviso'])->name('aviso');

Route::delete('/sistema-reservas/mostrar/cliente/{cliente}', [ClienteController::class, 'destroy'])->name('eliminar');

Route::get('/sistema-reservas/clientes/pdf', [ClienteController::class, 'GenerarPDF'])->name('pdf');

//Vista de Reservas

Route::get('/sistema-reservas/reservas/{cliente}', [ClienteController::class, 'mostrarReservas'])->name('reserva');

Route::get('/sistema-reservas/crear/reserva/{cliente}', [ReservaController::class, 'create'])->name('reservar');

Route::post('/sistema-reservas/reservas/{cliente}', [ReservaController::class, 'store'])->name('reservado');

Route::get('/sistema-reservas/mostrar/reserva/{reserva}/cliente/{cliente}', [ReservaController::class, 'show'])->name('mostrar-reserva');

Route::get('/sistema-reservas/editar/reserva/{reserva}/cliente/{cliente}', [ReservaController::class, 'edit'])->name('editar-reserva');

Route::put('/sistema-reservas/mostrar/reserva/{reserva}/cliente/{cliente}', [ReservaController::class, 'update'])->name('actualizar-reserva');

Route::get('/sistema-reservas/eliminar/reserva/{reserva}/cliente/{cliente}', [ReservaController::class, 'aviso'])->name('aviso-reserva');

Route::delete('/sistema-reservas/mostrar/reserva/{reserva}/cliente/{cliente}', [ReservaController::class, 'destroy'])->name('eliminar-reserva');

Route::get('/sistema-reservas/reservas/{cliente}/pdf', [ReservaController::class, 'GenerarPDF'])->name('pdf-reserva');

Route::get('sistema-reservas/contador', [ReservaController::class, 'counter'])->name('contador');