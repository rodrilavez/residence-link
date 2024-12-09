<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class VerRecordatoriosPagos extends Component
{
    public $recordatorios;

    public function mount()
    {
        $this->recordatorios = Pago::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.ver-recordatorios-pagos', ['recordatorios' => $this->recordatorios]);
    }
} 