<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propiedad;
use App\Models\Zona;

class PropiedadesTable extends Component
{
    public $nombre;
    public $zona_id;
    public $direccion;
    public $propiedades;
    public $zonas;
    public $propiedadId;
    public $es_amenidad = false;
    public $isEdit;

    public function mount()
    {
        $this->propiedades = Propiedad::all();
        $this->zonas = Zona::all(); // Cargar todas las zonas para el dropdown
    }

    public function render()
    {
        return view('livewire.propiedades-table');
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'zona_id' => 'required|exists:zonas,id',
            'direccion' => 'required',
        ]);

        Propiedad::create([
            'nombre' => $this->nombre,
            'zona_id' => $this->zona_id,
            'direccion' => $this->direccion,
            'es_amenidad' => $this->es_amenidad ?? false,
        ]);

        $this->resetForm();
        $this->propiedades = Propiedad::all();
        session()->flash('success', 'Propiedad creada exitosamente.');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->zona_id = null;
        $this->direccion = '';
        $this->es_amenidad = false;
    }

    public function edit($id)
    {
        $propiedad = Propiedad::find($id);
        $this->propiedadId = $propiedad->id;
        $this->nombre = $propiedad->nombre;
        $this->zona_id = $propiedad->zona_id;
        $this->direccion = $propiedad->direccion;
        $this->es_amenidad = $propiedad->es_amenidad;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'zona_id' => 'required|exists:zonas,id',
            'direccion' => 'required',
        ]);

        $propiedad = Propiedad::find($this->propiedadId);
        $propiedad->update([
            'nombre' => $this->nombre,
            'zona_id' => $this->zona_id,
            'direccion' => $this->direccion,
            'es_amenidad' => $this->es_amenidad ?? false,
        ]);

        $this->resetForm();
        $this->propiedades = Propiedad::all();
        session()->flash('success', 'Propiedad actualizada exitosamente.');
    }

    public function delete($id)
    {
        $propiedad = Propiedad::find($id);
        if ($propiedad) {
            $propiedad->delete();
            $this->propiedades = Propiedad::all();
            session()->flash('success', 'Propiedad eliminada exitosamente.');
        } else {
            session()->flash('error', 'La propiedad no existe.');
        }
    }
}
