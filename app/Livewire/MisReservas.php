<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class MisReservas extends Component
{
    public $reservas;

    public function mount()
    {
        $this->reservas = Reserva::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.mis-reservas', ['reservas' => $this->reservas]);
    }
} 