<?php

namespace App\Http\Controllers;

use App\Models\Residente;
use Illuminate\Http\Request;

class ResidenteController extends Controller
{
    public function index(Request $request)
    {
        // Solo el admin puede listar todos los residentes
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        return Residente::with(['user', 'propiedad'])->get();
    }

    public function show(Request $request, Residente $residente)
    {
        // Admin puede ver cualquier residente
        // Un residente solo puede verse a sí mismo (si se desea implementar esta lógica)
        if ($request->user()->role === 'admin' || $request->user()->id === $residente->user_id) {
            return $residente->load(['user', 'propiedad']);
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function store(Request $request)
    {
        // Validar que la propiedad existe
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'propiedad_id' => 'required|exists:propiedades,id',
            'telefono' => 'nullable'
        ]);

        $residente = Residente::create($request->all());
        return response()->json($residente, 201);
    }

    public function update(Request $request, Residente $residente)
    {
        // Admin puede actualizar. 
        // Un residente podría actualizar su propio teléfono si se desea:
        if ($request->user()->role !== 'admin' && $request->user()->id !== $residente->user_id) {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $residente->update($request->all());
        return response()->json($residente, 200);
    }

    public function destroy(Request $request, Residente $residente)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $residente->delete();
        return response()->json(null, 204);
    }
}
