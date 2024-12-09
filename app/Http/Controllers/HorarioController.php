<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use App\Notifications\CambioDeTurnoNotification;

class HorarioController extends Controller
{
    public function index(Request $request)
    {
        // Admin puede ver todos los horarios
        // El guardia puede ver sus propios horarios
        if ($request->user()->role === 'admin') {
            return Horario::with('guardia.user')->get();
        } elseif ($request->user()->role === 'guard') {
            return Horario::with('guardia.user')->whereHas('guardia', function($q) use ($request){
                $q->where('user_id', $request->user()->id);
            })->get();
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function show(Request $request, Horario $horario)
    {
        // Admin o el guardia propietario del horario
        $isOwner = ($request->user()->role === 'guard' && $horario->guardia->user_id === $request->user()->id);
        if ($request->user()->role === 'admin' || $isOwner) {
            return $horario->load('guardia.user');
        }

        return response()->json(['message' => 'No autorizado'], 403);
    }

    public function store(Request $request)
    {
        // Solo admin asigna horarios
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $request->validate([
            'guardia_id' => 'required|exists:guardias,id',
            'inicio'     => 'required|date',
            'fin'        => 'required|date|after:inicio'
        ]);

        $horario = Horario::create($request->all());
        return response()->json($horario, 201);
    }

    public function update(Request $request, Horario $horario)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        // Lógica para actualizar el horario
        $horario->update($request->all());

        // Enviar notificación al guardia
        $guardia = $horario->guardia->user;
        if ($guardia) {
            $guardia->notify(new CambioDeTurnoNotification());
        }

        return response()->json($horario, 200);
    }

    public function destroy(Request $request, Horario $horario)
    {
        // Solo admin
        if ($request->user()->role !== 'admin') {
            return response()->json(['message' => 'No autorizado'], 403);
        }

        $horario->delete();
        return response()->json(null, 204);
    }
}
