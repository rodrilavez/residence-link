<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Guardia;
use App\Models\User;
use App\Models\Zona;

class GuardiasTable extends Component
{
    public $guardias;
    public $user_id;
    public $zona_id;
    public $guardiaId;
    public $isEdit = false;
    public $usuariosGuard;
    public $zonas;

    public function mount()
    {
        $this->guardias = Guardia::with(['user', 'zona'])->get();
        $this->usuariosGuard = User::where('role', 'guard')->get();
        $this->zonas = Zona::all();
    }

    public function render()
    {
        return view('livewire.guardias-table');
    }

    public function resetForm()
    {
        $this->user_id = '';
        $this->zona_id = '';
        $this->guardiaId = null;
        $this->isEdit = false;
    }

    public function store()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'zona_id' => 'required|exists:zonas,id',
        ]);

        Guardia::create([
            'user_id' => $this->user_id,
            'zona_id' => $this->zona_id,
        ]);

        $this->resetForm();
        $this->guardias = Guardia::with(['user', 'zona'])->get(); // Recargar datos
    }

    public function edit($id)
    {
        $guardia = Guardia::find($id);
        $this->guardiaId = $guardia->id;
        $this->user_id = $guardia->user_id;
        $this->zona_id = $guardia->zona_id;
        $this->isEdit = true;
    }

    public function update()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'zona_id' => 'required|exists:zonas,id',
        ]);

        $guardia = Guardia::find($this->guardiaId);
        $guardia->update([
            'user_id' => $this->user_id,
            'zona_id' => $this->zona_id,
        ]);

        $this->resetForm();
        $this->guardias = Guardia::with(['user', 'zona'])->get();
    }

    public function delete($id)
    {
        Guardia::find($id)->delete();
        $this->guardias = Guardia::with(['user', 'zona'])->get();
    }
}
