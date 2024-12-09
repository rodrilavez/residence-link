<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pago;
use App\Models\Residente;
use Illuminate\Support\Facades\Auth;

class RecordatoriosPagos extends Component
{
    public $residentes;
    public $residente_id;
    public $fecha_recordatorio;
    public $monto;
    public $mensaje;

    public function mount()
    {
        $this->residentes = Residente::with('user')->get();
    }

    public function enviarRecordatorio()
    {
        $this->validate([
            'residente_id' => 'required|exists:residentes,id',
            'fecha_recordatorio' => 'required|date',
            'monto' => 'required|numeric|min:0',
            'mensaje' => 'required|string',
        ]);

        Pago::create([
            'user_id' => $this->residente_id,
            'fecha_recordatorio' => $this->fecha_recordatorio,
            'monto' => $this->monto,
            'mensaje' => $this->mensaje,
        ]);

        session()->flash('success', 'Recordatorio enviado exitosamente.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->residente_id = '';
        $this->fecha_recordatorio = '';
        $this->monto = '';
        $this->mensaje = '';
    }

    public function render()
    {
        return view('livewire.recordatorios-pagos', ['residentes' => $this->residentes]);
    }
}
