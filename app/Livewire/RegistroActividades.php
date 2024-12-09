<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actividad;
use App\Models\Residente;
use App\Models\Amenidad;
use Illuminate\Support\Facades\Auth;

class RegistroActividades extends Component
{
    public $tipo;
    public $descripcion;
    public $actividades;
    public $residentes;
    public $amenidades;
    public $residente_id;
    public $amenidad_id;

    public function mount()
    {
        $this->loadActividades();
        $this->residentes = Residente::all();
        $this->amenidades = Amenidad::all();
    }

    public function loadActividades()
    {
        $this->actividades = Actividad::where('user_id', Auth::id())->latest()->get();
    }

    public function registrar()
    {
        $this->validate([
            'tipo' => 'required|in:entrada,salida,incidencia',
            'descripcion' => 'nullable|string',
            'residente_id' => 'nullable|exists:residentes,id',
            'amenidad_id' => 'nullable|exists:amenidades,id',
        ]);

        Actividad::create([
            'user_id' => Auth::id(),
            'tipo' => $this->tipo,
            'descripcion' => $this->descripcion,
            'residente_id' => $this->residente_id,
            'amenidad_id' => $this->amenidad_id,
        ]);

        session()->flash('success', 'Actividad registrada con éxito.');
        $this->reset(['tipo', 'descripcion', 'residente_id', 'amenidad_id']);
        $this->loadActividades();
    }

    public function render()
    {
        return view('livewire.registro-actividades');
    }
}
