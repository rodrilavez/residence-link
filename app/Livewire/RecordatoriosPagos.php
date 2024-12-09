<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class RecordatoriosPagos extends Component
{
    public $recordatorios;

    public function mount()
    {
        $this->recordatorios = Pago::where('user_id', Auth::id())
                                   ->where('fecha_recordatorio', '>=', now())
                                   ->get();
    }

    public function render()
    {
        return view('livewire.recordatorios-pagos', ['recordatorios' => $this->recordatorios]);
    }
}
