<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incidencia;

class AdminIncidencias extends Component
{
    public $incidencias;

    public function mount()
    {
        $this->incidencias = Incidencia::with('residente.user')->get();
    }

    public function render()
    {
        return view('livewire.admin-incidencias', ['incidencias' => $this->incidencias]);
    }
}