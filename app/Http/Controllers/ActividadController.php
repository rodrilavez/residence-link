<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:entrada,salida,incidencia',
            'residente_id' => 'nullable|exists:residentes,id',
            'amenidad_id' => 'nullable|exists:amenidades,id',
            'descripcion' => 'nullable|string',
        ]);

        Actividad::create($request->all());

        return redirect()->back()->with('success', 'Actividad registrada con éxito.');
    }
} 