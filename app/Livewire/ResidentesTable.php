<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Residente;

class ResidentesTable extends Component
{
    public $residentes;
    public $nombre;
    public $email;
    public $residenteId;
    public $isEdit = false;

    public function mount()
    {
        $this->residentes = Residente::all();
    }

    public function render()
    {
        return view('livewire.residentes-table');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->email = '';
        $this->residenteId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        Residente::create([
            'nombre' => $this->nombre,
            'email' => $this->email
        ]);

        $this->resetForm();
        $this->residentes = Residente::all(); // Recargar datos
    }

    public function edit($id)
    {
        $residente = Residente::find($id);
        $this->residenteId = $residente->id;
        $this->nombre = $residente->nombre;
        $this->email = $residente->email;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $residente = Residente::find($this->residenteId);
        $residente->update([
            'nombre' => $this->nombre,
            'email' => $this->email
        ]);

        $this->resetForm();
        $this->residentes = Residente::all();
    }

    public function delete($id)
    {
        Residente::find($id)->delete();
        $this->residentes = Residente::all();
    }
}
