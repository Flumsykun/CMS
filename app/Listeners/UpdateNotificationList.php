<?php

namespace App\Listeners;

use App\Events\NotificationAdded;
use App\Models\Page;
use App\Models\User;
use App\Notifications\PageEventNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class UpdateNotificationList implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(NotificationAdded $event): void
    {
        //Get the user who should receive the notification
        $user = User::find($event->userId);

        //Check if the user exist
        if ($user instanceof User){
            //Extract the message from the event
            $message = $event->message;

            //Create a new notification for the user with the extracted message
            $notification = new PageEventNotification($message);

            //Attach the notification to the user
            $user->notify($notification);

            //$user->notifications()->create([
            //    'id' => (string) Str::uuid(),
            //    'type' => get_class(new PageEventNotification()),
            //    'message' => $event->message,
            //]);
        }
    }
}
