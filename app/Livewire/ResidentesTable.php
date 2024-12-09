<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Residente;
use App\Models\Propiedad;
use App\Models\User;

class ResidentesTable extends Component
{
    public $user_id;
    public $propiedad_id;
    public $usuarios;
    public $propiedades;
    public $residentes;

    public function mount()
    {
        $this->usuarios = User::where('role', 'residente')->get();
        $this->propiedades = Propiedad::all();
        $this->residentes = Residente::with('propiedad.zona', 'user')->get();
    }

    public function assignProperty()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'propiedad_id' => 'required|exists:propiedades,id',
        ]);

        Residente::updateOrCreate(
            ['user_id' => $this->user_id],
            ['propiedad_id' => $this->propiedad_id]
        );

        $this->residentes = Residente::with('propiedad.zona', 'user')->get();
        session()->flash('success', 'Propiedad asignada exitosamente.');
    }

    public function render()
    {
        return view('livewire.residentes-table');
    }
}
