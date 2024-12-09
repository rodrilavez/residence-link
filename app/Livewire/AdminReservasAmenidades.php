<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;

class AdminReservasAmenidades extends Component
{
    public $reservas;

    public function mount()
    {
        $this->reservas = Reserva::with('amenidad', 'user')->get();
    }

    public function render()
    {
        return view('livewire.admin-reservas-amenidades', ['reservas' => $this->reservas]);
    }
}
