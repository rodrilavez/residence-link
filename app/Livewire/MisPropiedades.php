<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Residente;
use App\Models\Propiedad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class MisPropiedades extends Component
{
    public $propiedades;
    public $amenidades;

    public function mount()
    {
        $residente = Residente::where('user_id', Auth::id())->with('propiedad.zona')->first();

        if ($residente) {
            $this->propiedades = $residente->propiedad ? collect([$residente->propiedad]) : collect();
            $zonaId = $residente->propiedad->zona_id ?? null;
            if ($zonaId) {
                $this->amenidades = Propiedad::where('zona_id', $zonaId)
                                             ->where('es_amenidad', true)
                                             ->get();
            } else {
                $this->amenidades = collect();
            }
        } else {
            $this->propiedades = collect();
            $this->amenidades = collect();
        }
    }

    public function render()
    {
        return view('livewire.mis-propiedades');
    }
}
