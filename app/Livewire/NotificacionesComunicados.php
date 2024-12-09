<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;

class NotificacionesComunicados extends Component
{
    public $notificaciones;

    public function mount()
    {
        $this->notificaciones = Notification::latest()->get();
    }

    public function render()
    {
        return view('livewire.notificaciones-comunicados', ['notificaciones' => $this->notificaciones]);
    }
}
