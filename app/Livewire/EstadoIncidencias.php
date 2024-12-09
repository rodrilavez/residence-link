<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class EstadoIncidencias extends Component
{
    public $incidencias;

    public function mount()
    {
        $this->incidencias = Incidencia::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.estado-incidencias', ['incidencias' => $this->incidencias]);
    }
}
