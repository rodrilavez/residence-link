<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function index(Request $request)
    {
        // Admin puede ver todas las incidencias
        // Residentes o guardias tal vez no puedan ver todas (depende de la lógica)
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return Incidencia::with('user')->get();
    }

    public function store(Request $request)
    {
        // Cualquier usuario autenticado puede reportar incidencia
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $incidencia = Incidencia::create([
            'user_id' => $request->user()->id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json(['message' => 'Incidencia reportada', 'incidencia' => $incidencia], 201);
    }

    public function show(Request $request, Incidencia $incidencia)
    {
        // Admin puede ver cualquier incidencia
        // El usuario creador puede ver la suya
        if ($request->user()->role === 'admin' || $incidencia->user_id === $request->user()->id) {
            return $incidencia->load('user');
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function update(Request $request, Incidencia $incidencia)
    {
        // Solo admin podría actualizar el estado de la incidencia, por ejemplo
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $incidencia->update($request->all());
        return response()->json($incidencia, 200);
    }

    public function destroy(Request $request, Incidencia $incidencia)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $incidencia->delete();
        return response()->json(null, 204);
    }
}
