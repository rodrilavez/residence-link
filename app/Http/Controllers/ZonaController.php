<?php

namespace App\Http\Controllers;

use App\Models\Zona;
use Illuminate\Http\Request;

class ZonaController extends Controller
{
    public function index()
    {
        return Zona::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $zona = Zona::create($request->all());
        return response()->json($zona, 201);
    }

    public function show(Zona $zona)
    {
        return $zona;
    }

    public function update(Request $request, Zona $zona)
    {
        $zona->update($request->all());
        return response()->json($zona, 200);
    }

    public function destroy(Zona $zona)
    {
        $zona->delete();
        return response()->json(null, 204);
    }
}
