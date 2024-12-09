<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Turno;
use Illuminate\Support\Facades\Auth;

class ViewTurnos extends Component
{
    public $turnosPasados;
    public $turnosActuales;
    public $turnosProximos;

    public function mount()
    {
        $userId = Auth::id();
        $now = now();

        $this->turnosPasados = Turno::where('user_id', $userId)->where('fin', '<', $now)->get();
        $this->turnosActuales = Turno::where('user_id', $userId)->where('inicio', '<=', $now)->where('fin', '>=', $now)->get();
        $this->turnosProximos = Turno::where('user_id', $userId)->where('inicio', '>', $now)->get();
    }

    public function render()
    {
        return view('livewire.view-turnos');
    }
}
