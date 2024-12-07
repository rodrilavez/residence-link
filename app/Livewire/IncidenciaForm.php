<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incidencia;

class IncidenciaForm extends Component
{
    public $incidencias;
    public $titulo;
    public $descripcion;
    public $incidenciaId;
    public $isEdit = false;

    public function mount()
    {
        $this->incidencias = Incidencia::all();
    }

    public function render()
    {
        return view('livewire.incidencia-form');
    }

    public function resetForm()
    {
        $this->titulo = '';
        $this->descripcion = '';
        $this->incidenciaId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        Incidencia::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion
        ]);

        $this->resetForm();
        $this->incidencias = Incidencia::all(); // Recargar datos
    }

    public function edit($id)
    {
        $incidencia = Incidencia::find($id);
        $this->incidenciaId = $incidencia->id;
        $this->titulo = $incidencia->titulo;
        $this->descripcion = $incidencia->descripcion;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
        ]);

        $incidencia = Incidencia::find($this->incidenciaId);
        $incidencia->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion
        ]);

        $this->resetForm();
        $this->incidencias = Incidencia::all();
    }

    public function delete($id)
    {
        Incidencia::find($id)->delete();
        $this->incidencias = Incidencia::all();
    }
}
