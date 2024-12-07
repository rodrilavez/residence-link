<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\PropiedadController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\GuardiaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IncidenciaController;

Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);

// Rutas protegidas
Route::middleware(['auth:sanctum'])->group(function() {
    // Zonas
    Route::get('/zonas', [ZonaController::class, 'index']);
    Route::post('/zonas', [ZonaController::class, 'store']);
    Route::get('/zonas/{zona}', [ZonaController::class, 'show']);
    Route::put('/zonas/{zona}', [ZonaController::class, 'update']);
    Route::delete('/zonas/{zona}', [ZonaController::class, 'destroy']);
    
    // Propiedades
    Route::get('/propiedades', [PropiedadController::class, 'index']);
    Route::post('/propiedades', [PropiedadController::class, 'store']);
    Route::get('/propiedades/{propiedad}', [PropiedadController::class, 'show']);
    Route::put('/propiedades/{propiedad}', [PropiedadController::class, 'update']);
    Route::delete('/propiedades/{propiedad}', [PropiedadController::class, 'destroy']);
    
    // Residentes
    Route::get('/residentes', [ResidenteController::class, 'index']);
    Route::post('/residentes', [ResidenteController::class, 'store']);
    Route::get('/residentes/{residente}', [ResidenteController::class, 'show']);
    Route::put('/residentes/{residente}', [ResidenteController::class, 'update']);
    Route::delete('/residentes/{residente}', [ResidenteController::class, 'destroy']);
    
    // Guardias
    Route::get('/guardias', [GuardiaController::class, 'index']);
    Route::post('/guardias', [GuardiaController::class, 'store']);
    Route::get('/guardias/{guardia}', [GuardiaController::class, 'show']);
    Route::put('/guardias/{guardia}', [GuardiaController::class, 'update']);
    Route::delete('/guardias/{guardia}', [GuardiaController::class, 'destroy']);
    
    // Horarios
    Route::get('/horarios', [HorarioController::class, 'index']);
    Route::post('/horarios', [HorarioController::class, 'store']);
    Route::get('/horarios/{horario}', [HorarioController::class, 'show']);
    Route::put('/horarios/{horario}', [HorarioController::class, 'update']);
    Route::delete('/horarios/{horario}', [HorarioController::class, 'destroy']);

    // Usuarios (opcional)
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // Incidencias (opcional - punto extra)
    Route::get('/incidencias', [IncidenciaController::class, 'index']);
    Route::post('/incidencias', [IncidenciaController::class, 'store']);
    Route::get('/incidencias/{incidencia}', [IncidenciaController::class, 'show']);
    Route::put('/incidencias/{incidencia}', [IncidenciaController::class, 'update']);
    Route::delete('/incidencias/{incidencia}', [IncidenciaController::class, 'destroy']);

    // Logout
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
