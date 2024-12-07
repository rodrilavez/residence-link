<?php

namespace App\Http\Controllers;

use App\Models\Guardia;
use Illuminate\Http\Request;

class GuardiaController extends Controller
{
    public function index(Request $request)
    {
        // Admin puede listar todos, Guard puede verse a sí mismo (opcional), Residente no.
        if ($request->user()->role === 'admin') {
            return Guardia::with(['user','zona'])->get();
        } elseif ($request->user()->role === 'guard') {
            // Listar solo el guardia logueado (si se desea)
            return Guardia::with(['user','zona'])->where('user_id', $request->user()->id)->get();
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function show(Request $request, Guardia $guardia)
    {
        if ($request->user()->role === 'admin' || ($request->user()->role === 'guard' && $request->user()->id === $guardia->user_id)) {
            return $guardia->load(['user','zona']);
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function store(Request $request)
    {
        // Solo admin crea guardias
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'zona_id' => 'required|exists:zonas,id'
        ]);

        $guardia = Guardia::create($request->all());
        return response()->json($guardia, 201);
    }

    public function update(Request $request, Guardia $guardia)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $guardia->update($request->all());
        return response()->json($guardia, 200);
    }

    public function destroy(Request $request, Guardia $guardia)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $guardia->delete();
        return response()->json(null, 204);
    }
}
