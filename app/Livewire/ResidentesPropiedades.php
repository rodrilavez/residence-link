<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Residente;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Auth;

class ResidentesPropiedades extends Component
{
    public $residentes;
    public $propiedades;

    public function mount()
    {
        $guardia = Auth::user()->guardia;
        if ($guardia) {
            $zonaId = $guardia->zona_id;
            $this->residentes = Residente::whereHas('propiedad', function ($query) use ($zonaId) {
                $query->where('zona_id', $zonaId);
            })->get();

            $this->propiedades = Propiedad::where('zona_id', $zonaId)->get();
        } else {
            $this->residentes = collect();
            $this->propiedades = collect();
        }
    }

    public function render()
    {
        return view('livewire.residentes-propiedades');
    }
}
