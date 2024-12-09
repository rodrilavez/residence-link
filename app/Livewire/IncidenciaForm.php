<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class IncidenciaForm extends Component
{
    public $descripcion;
    public $estado = 'pendiente'; // Default state for new incidents

    public function submit()
    {
        $this->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        if (!$user || !$user->residente) {
            session()->flash('error', 'No se puede reportar la incidencia. El usuario no está asociado a un residente.');
            return;
        }

        Incidencia::create([
            'residente_id' => $user->residente->id,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
        ]);

        session()->flash('success', 'Incidencia reportada exitosamente.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->descripcion = '';
    }

    public function render()
    {
        return view('livewire.incidencia-form');
    }
}
