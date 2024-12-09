<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actividad;

class AdminVerActividades extends Component
{
    public $actividades;

    public function mount()
    {
        $this->actividades = Actividad::with(['residente.user', 'guard'])->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.admin-ver-actividades', [
            'actividades' => $this->actividades,
        ]);
    }
}
