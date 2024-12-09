<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Propiedad;
use App\Models\Zona;
use App\Models\User;
use App\Models\Residente;
use Illuminate\Support\Facades\Auth;

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
    public $user_id;
    public $usuarios;
    public $residentes;

    public function mount()
    {
        $this->propiedades = Propiedad::all();
        $this->zonas = Zona::all();
        $this->usuarios = User::where('role', 'residente')->get();
        $this->residentes = Residente::with('propiedad.zona', 'user')->get();
    }

    public function assign()
    {
        $this->validate([
            'user_id' => 'required|exists:users,id',
            'propiedad_id' => 'required|exists:propiedades,id',
        ]);

        Residente::updateOrCreate(
            ['user_id' => $this->user_id],
            ['propiedad_id' => $this->propiedad_id]
        );

        $this->residentes = Residente::with('propiedad.zona', 'user')->get();
        session()->flash('success', 'Propiedad asignada exitosamente.');
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
            'user_id' => Auth::id(),
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
        if ($propiedad) {
            $this->propiedadId = $propiedad->id;
            $this->nombre = $propiedad->nombre;
            $this->zona_id = $propiedad->zona_id;
            $this->direccion = $propiedad->direccion;
            $this->es_amenidad = $propiedad->es_amenidad;
            $this->isEdit = true;
        } else {
            session()->flash('error', 'La propiedad no existe.');
        }
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'zona_id' => 'required|exists:zonas,id',
            'direccion' => 'required',
        ]);

        $propiedad = Propiedad::find($this->propiedadId);
        if ($propiedad) {
            $propiedad->update([
                'nombre' => $this->nombre,
                'zona_id' => $this->zona_id,
                'direccion' => $this->direccion,
                'es_amenidad' => $this->es_amenidad ?? false,
            ]);

            $this->resetForm();
            $this->propiedades = Propiedad::all();
            session()->flash('success', 'Propiedad actualizada exitosamente.');
        } else {
            session()->flash('error', 'La propiedad no existe.');
        }
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
