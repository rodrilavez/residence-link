<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Incidencia;
use Illuminate\Support\Facades\Auth;

class IncidenciaForm extends Component
{
    public $incidencias;
    public $titulo;
    public $descripcion;
    public $incidenciaId;
    public $isEdit = false;

    public function mount()
    {
        $this->incidencias = Incidencia::where('user_id', Auth::id())->get();
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
            'user_id' => Auth::id(),
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
        ]);

        $this->resetForm();
        $this->incidencias = Incidencia::where('user_id', Auth::id())->get();
        session()->flash('success', 'Incidencia reportada exitosamente.');
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
        $this->incidencias = Incidencia::where('user_id', Auth::id())->get();
    }

    public function delete($id)
    {
        Incidencia::find($id)->delete();
        $this->incidencias = Incidencia::where('user_id', Auth::id())->get();
    }
}
