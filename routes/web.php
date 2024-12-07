<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuardiaController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas para Propiedades
    Route::resource('propiedades', PropiedadController::class);

    // Rutas para Zonas
    Route::resource('zonas', ZonaController::class);

    // Rutas para Usuarios
    Route::resource('users', UserController::class);

    // Rutas para Guardias
    Route::resource('guardias', GuardiaController::class);

    // Rutas para Residentes
    Route::resource('residentes', ResidenteController::class);

    // Rutas para Horarios
    Route::resource('horarios', HorarioController::class);

    // Rutas para Incidencias
    Route::resource('incidencias', IncidenciaController::class);
});

// Rutas de autenticación
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


