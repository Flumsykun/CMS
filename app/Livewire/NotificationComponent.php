<?php

namespace App\Livewire;

use App\Models\Page;
use App\Observers\PageObserver;
use Livewire\Component;

class NotificationComponent extends Component
{
    public array $notifications = [];
    protected $listeners = [];


    public function mount()
    {
        $this->listeners = ['echo:user.' . auth()->id() . ',NotificationAdded' => 'updateNotifications'];
        $this->updateNotifications();
    }

    public function updateNotifications() : void
    {
        $this->notifications = auth()->user()->unreadNotifications;

    }

    public function NotificationAdded(): void
    {
        $this->updateNotifications();
    }

    public function render()
    {
        return view('livewire.notification-component');
    }
}
