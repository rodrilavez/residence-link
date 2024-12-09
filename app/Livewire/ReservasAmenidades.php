<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Amenidad;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservasAmenidades extends Component
{
    public $amenidades;
    public $selectedAmenidad;
    public $reservas;

    public function mount()
    {
        $this->amenidades = Amenidad::all();
        $this->reservas = Reserva::where('user_id', Auth::id())->get();
    }

    public function reservarAmenidad($amenidadId)
    {
        Reserva::create([
            'user_id' => Auth::id(),
            'amenidad_id' => $amenidadId,
            'fecha' => now(), // Example date, adjust as needed
        ]);

        $this->reservas = Reserva::where('user_id', Auth::id())->get();
        session()->flash('success', 'Amenidad reservada exitosamente.');
    }

    public function render()
    {
        return view('livewire.reservas-amenidades');
    }
}
