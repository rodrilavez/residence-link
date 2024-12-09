<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Amenidad;
use App\Models\Propiedad;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservasAmenidades extends Component
{
    public $amenidades;
    public $reservas;

    public function mount()
    {
        $this->amenidades = Propiedad::where('es_amenidad', true)->get();
        $this->reservas = Reserva::where('user_id', Auth::id())->get();
    }

    public function reservar($amenidadId, $fecha)
    {
        // Verifica si la fecha ya está reservada
        $existeReserva = Reserva::where('amenidad_id', $amenidadId)
                                ->where('fecha_reserva', $fecha)
                                ->exists();

        if ($existeReserva) {
            session()->flash('error', 'Esta fecha ya está reservada.');
            return;
        }

        // Crea la reserva
        Reserva::create([
            'amenidad_id' => $amenidadId,
            'user_id' => Auth::id(),
            'fecha_reserva' => $fecha,
        ]);

        session()->flash('success', 'Reserva creada exitosamente.');
    }

    public function render()
    {
        return view('livewire.reservas-amenidades', [
            'amenidades' => $this->amenidades,
            'reservas' => $this->reservas,
        ]);
    }
}
