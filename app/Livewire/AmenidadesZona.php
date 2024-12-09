<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Amenidad;
use Illuminate\Support\Facades\Auth;

class AmenidadesZona extends Component
{
    public $amenidades;

    public function mount()
    {
        $residente = Auth::user()->residente;
        if ($residente && $residente->propiedad) {
            $zonaId = $residente->propiedad->zona_id;
            $this->amenidades = Amenidad::where('zona_id', $zonaId)->get();
        } else {
            $this->amenidades = collect();
        }
    }

    public function render()
    {
        return view('livewire.amenidades-zona');
    }
}