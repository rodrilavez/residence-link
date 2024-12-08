<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Zona;

class ZonasTable extends Component
{
    public $zonas;
    public $nombre;
    public $descripcion;
    public $zonaId;
    public $isEdit = false;

    public function mount()
    {
        $this->zonas = Zona::all();
    }

    public function render()
    {
        return view('livewire.zonas-table');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->descripcion = '';
        $this->zonaId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        try {
            Zona::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion
            ]);

            $this->resetForm();
            $this->zonas = Zona::all(); // Recargar datos
            session()->flash('success', 'Zona creada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear la zona.');
        }
    }

    public function edit($id)
    {
        $zona = Zona::find($id);
        $this->zonaId = $zona->id;
        $this->nombre = $zona->nombre;
        $this->descripcion = $zona->descripcion;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
        ]);

        try {
            $zona = Zona::find($this->zonaId);
            $zona->update([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion
            ]);

            $this->resetForm();
            $this->zonas = Zona::all();
            session()->flash('success', 'Zona actualizada exitosamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al actualizar la zona.');
        }
    }

    public function delete($id)
    {
        try {
            $zona = Zona::find($id);
            
            if ($zona) {
                $zona->delete();
                $this->zonas = Zona::all();
                session()->flash('success', 'Zona eliminada exitosamente.');
            } else {
                session()->flash('error', 'La zona no existe.');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Error al eliminar la zona.');
        }
    }
}
