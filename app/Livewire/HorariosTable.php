<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Horario;

class HorariosTable extends Component
{
    public $horarios;
    public $nombre;
    public $hora_inicio;
    public $hora_fin;
    public $horarioId;
    public $isEdit = false;

    public function mount()
    {
        $this->horarios = Horario::all();
    }

    public function render()
    {
        return view('livewire.horarios-table');
    }

    public function resetForm()
    {
        $this->nombre = '';
        $this->hora_inicio = '';
        $this->hora_fin = '';
        $this->horarioId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        Horario::create([
            'nombre' => $this->nombre,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin
        ]);

        $this->resetForm();
        $this->horarios = Horario::all(); // Recargar datos
    }

    public function edit($id)
    {
        $horario = Horario::find($id);
        $this->horarioId = $horario->id;
        $this->nombre = $horario->nombre;
        $this->hora_inicio = $horario->hora_inicio;
        $this->hora_fin = $horario->hora_fin;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        $horario = Horario::find($this->horarioId);
        $horario->update([
            'nombre' => $this->nombre,
            'hora_inicio' => $this->hora_inicio,
            'hora_fin' => $this->hora_fin
        ]);

        $this->resetForm();
        $this->horarios = Horario::all();
    }

    public function delete($id)
    {
        Horario::find($id)->delete();
        $this->horarios = Horario::all();
    }
}
