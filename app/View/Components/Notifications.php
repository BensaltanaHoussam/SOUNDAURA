<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Notifications extends Component
{
    public $notifications;
    public $unreadCount;

    public function __construct()
    {
        $user = auth()->user();
        $this->notifications = $user->notifications()->latest()->take(10)->get();
        $this->unreadCount = $user->unreadNotifications()->count();
    }

    public function render()
    {
        return view('components.notifications');
    }
}
