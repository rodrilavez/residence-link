<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class HistorialFinanciero extends Component
{
    public $pagos;

    public function mount()
    {
        $this->pagos = Pago::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.historial-financiero', ['pagos' => $this->pagos]);
    }
}
