<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pago;
use Illuminate\Support\Facades\Auth;

class PagosFinanzas extends Component
{
    public $monto;
    public $descripcion;
    public $pagos;

    public function mount()
    {
        $this->pagos = Pago::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.pagos-finanzas');
    }

    public function submit()
    {
        $this->validate([
            'monto' => 'required|numeric',
            'descripcion' => 'required',
        ]);

        Pago::create([
            'user_id' => Auth::id(),
            'monto' => $this->monto,
            'descripcion' => $this->descripcion,
        ]);

        $this->resetForm();
        $this->pagos = Pago::where('user_id', Auth::id())->get();
        session()->flash('success', 'Pago registrado exitosamente.');
    }

    public function resetForm()
    {
        $this->monto = '';
        $this->descripcion = '';
    }
}
