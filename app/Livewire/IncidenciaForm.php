<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Residente;
use App\Models\Amenidad;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class IncidenciaForm extends Component
{
    public $residentes;
    public $amenidades;
    public $residente_id;
    public $amenidad_id;
    public $descripcion;

    public function mount()
    {
        $guardia = Auth::user()->guardia;
        if ($guardia) {
            $zonaId = $guardia->zona_id;
            $this->residentes = Residente::whereHas('propiedad', function ($query) use ($zonaId) {
                $query->where('zona_id', $zonaId);
            })->with('user')->get();

            $this->amenidades = Amenidad::where('zona_id', $zonaId)->get();
        } else {
            $this->residentes = collect();
            $this->amenidades = collect();
        }
    }

    public function render()
    {
        return view('livewire.incidencia-form');
    }

    public function assignIncidencia()
    {
        $this->validate([
            'residente_id' => 'required|exists:residentes,id',
            'amenidad_id' => 'nullable|exists:amenidades,id',
            'descripcion' => 'required|string',
        ]);

        Incidencia::create([
            'residente_id' => $this->residente_id,
            'amenidad_id' => $this->amenidad_id,
            'descripcion' => $this->descripcion,
        ]);

        session()->flash('success', 'Incidencia asignada exitosamente.');
        $this->reset(['residente_id', 'amenidad_id', 'descripcion']);
    }
}
