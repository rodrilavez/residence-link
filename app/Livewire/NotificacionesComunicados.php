<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;

class NotificacionesComunicados extends Component
{
    public $notificaciones;

    public function mount()
    {
        $this->notificaciones = Notificacion::where('user_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.notificaciones-comunicados', ['notificaciones' => $this->notificaciones]);
    }
}
