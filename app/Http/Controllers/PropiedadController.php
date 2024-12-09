<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use App\Models\Zona;

class PropiedadController extends Controller
{
    public function index(Request $request)
    {
        // Cualquier usuario autenticado puede ver el listado de propiedades
        // Opcionalmente filtrar por amenidades: /api/propiedades?es_amenidad=true
        $query = Propiedad::query();
        if ($request->has('es_amenidad')) {
            $query->where('es_amenidad', $request->es_amenidad);
        }
        return $query->get();
    }

    public function show(Propiedad $propiedad)
    {
        // Todos los roles autenticados pueden ver detalle
        return $propiedad;
    }

    public function store(Request $request)
    {
        // Solo admin puede crear propiedades
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'zona_id' => 'required|exists:zonas,id',
            'nombre'  => 'required',
        ]);

        $propiedad = Propiedad::create($request->all());
        return response()->json($propiedad, 201);
    }

    public function update(Request $request, Propiedad $propiedad)
    {
        // Solo admin puede actualizar propiedades
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $propiedad->update($request->all());
        return response()->json($propiedad, 200);
    }

    public function destroy(Request $request, Propiedad $propiedad)
    {
        // Solo admin puede eliminar propiedades
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $propiedad->delete();
        return response()->json(null, 204);
    }

    public function create()
    {
        $zonas = Zona::all(); // Asegúrate de que estás obteniendo todas las zonas
        return view('propiedades.create', compact('zonas'));
    }
}
