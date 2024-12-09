<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Actividad;
use App\Models\Residente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GuardRegistroActividades extends Component
{
    public $residentes;
    public $residente_id;
    public $tipo;
    public $descripcion;

    public function mount()
    {
        $this->residentes = Residente::with('user')->get();
    }

    public function registrar()
    {
        $this->validate([
            'residente_id' => 'required|exists:residentes,id',
            'tipo' => 'required|in:entrada,salida',
            'descripcion' => 'nullable|string',
        ]);

        if (!Auth::check()) {
            Log::error('User is not authenticated.');
            session()->flash('error', 'User is not authenticated.');
            return;
        }

        $guardId = Auth::id();
        Log::info('Guard ID: ' . $guardId);

        if (is_null($guardId)) {
            Log::error('Guard ID is null.');
            session()->flash('error', 'Guard ID is null.');
            return;
        }

        try {
            Actividad::create([
                'residente_id' => $this->residente_id,
                'guard_id' => $guardId,
                'tipo' => $this->tipo,
                'descripcion' => $this->descripcion,
            ]);
            session()->flash('success', 'Actividad registrada exitosamente.');
        } catch (\Exception $e) {
            Log::error('Error creating actividad: ' . $e->getMessage());
            session()->flash('error', 'Error registering activity.');
        }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->residente_id = null;
        $this->tipo = null;
        $this->descripcion = '';
    }

    public function render()
    {
        return view('livewire.guard-registro-actividades');
    }
}
