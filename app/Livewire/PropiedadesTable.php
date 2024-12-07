<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propiedad;

class PropiedadesTable extends Component
{
    public $propiedades;
    public $nombre;
    public $direccion;
    public $propiedadId;
    public $isEdit = false;

    public function mount()
    {
        $this->propiedades = Propiedad::all();
    }

    public function render()
    {
        return view('livewire.propiedades-table');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->direccion = '';
        $this->propiedadId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        Propiedad::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion
        ]);

        $this->resetForm();
        $this->propiedades = Propiedad::all(); // Recargar datos
    }

    public function edit($id)
    {
        $propiedad = Propiedad::find($id);
        $this->propiedadId = $propiedad->id;
        $this->nombre = $propiedad->nombre;
        $this->direccion = $propiedad->direccion;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'direccion' => 'required',
        ]);

        $propiedad = Propiedad::find($this->propiedadId);
        $propiedad->update([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion
        ]);

        $this->resetForm();
        $this->propiedades = Propiedad::all();
    }

    public function delete($id)
    {
        Propiedad::find($id)->delete();
        $this->propiedades = Propiedad::all();
    }
}
