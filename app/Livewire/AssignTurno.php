<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Turno;
use App\Models\User;
use App\Models\Guardia;
use Carbon\Carbon;

class AssignTurno extends Component
{
    public $user_id;
    public $inicio;
    public $fin;
    public $usuarios;
    public $turnos;

    public function mount()
    {
        $this->usuarios = User::where('role', 'guard')->get();
        $this->loadTurnos();
    }

    public function assign()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'inicio' => 'required|date',
            'fin' => 'required|date|after:inicio',
        ]);

        Turno::create([
            'user_id' => $this->user_id,
            'inicio' => $this->inicio,
            'fin' => $this->fin,
        ]);

        session()->flash('success', 'Turno asignado exitosamente.');
        $this->loadTurnos();
    }

    public function loadTurnos()
    {
        $this->turnos = Turno::with('user.guardia.zona')->get();
    }

    public function render()
    {
        return view('livewire.assign-turno');
    }
}
