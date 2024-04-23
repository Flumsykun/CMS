<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NotificationAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $message;

    /**
     * Create a new event instance.
     *
     * @param int $userid
     * @param string $message
     * @return void
     */
    public function __construct($userId, $message)
    {
        //\Log::info('NotificationAdded event constructed');
        $this->userId = $userId;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        //\Log::info('NotificationAdded event broadcasted');
        return new Channel('user.' . $this->userId);
    }

// In the NotificationComponent
    public function updateNotifications()
    {
        //\Log::info('updateNotifications method called');
        $this->notifications = auth()->user()->unreadNotifications;
    }

    public function NotificationAdded(): void
    {
        //\Log::info('NotificationAdded event received');
        $this->updateNotifications();
    }
}
