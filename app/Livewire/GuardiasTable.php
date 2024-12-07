<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guardia;

class GuardiasTable extends Component
{
    public $guardias;
    public $nombre;
    public $turno;
    public $guardiaId;
    public $isEdit = false;

    public function mount()
    {
        $this->guardias = Guardia::all();
    }

    public function render()
    {
        return view('livewire.guardias-table');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->turno = '';
        $this->guardiaId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'turno' => 'required',
        ]);

        Guardia::create([
            'nombre' => $this->nombre,
            'turno' => $this->turno
        ]);

        $this->resetForm();
        $this->guardias = Guardia::all(); // Recargar datos
    }

    public function edit($id)
    {
        $guardia = Guardia::find($id);
        $this->guardiaId = $guardia->id;
        $this->nombre = $guardia->nombre;
        $this->turno = $guardia->turno;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'turno' => 'required',
        ]);

        $guardia = Guardia::find($this->guardiaId);
        $guardia->update([
            'nombre' => $this->nombre,
            'turno' => $this->turno
        ]);

        $this->resetForm();
        $this->guardias = Guardia::all();
    }

    public function delete($id)
    {
        Guardia::find($id)->delete();
        $this->guardias = Guardia::all();
    }
}
