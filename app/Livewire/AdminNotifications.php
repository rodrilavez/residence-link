<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AdminNotifications extends Component
{
    public $title;
    public $message;

    public function sendNotification()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Notification::create([
            'title' => $this->title,
            'message' => $this->message,
            'user_id' => Auth::id(), // Assuming the admin is logged in
        ]);

        session()->flash('success', 'Notificación enviada exitosamente.');
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->title = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.admin-notifications');
    }
}
