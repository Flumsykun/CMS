<?php

namespace App\Observers;

use App\Events\NotificationAdded;
use App\Models\Page;
use App\Notifications\PageEventNotification;
use Illuminate\Support\Facades\Auth;

class PageObserver
{
    /**
     * Handle the Page "created" event.
     */
    public function created(Page $page): void
    {
        $user = Auth::user();
        $message = 'A page was created: ' . $page->title;
        $user->notify(new PageEventNotification($message));
        //event(new NotificationAdded($user->id, $message));
        NotificationAdded::dispatch($user->id,$message);
    }
    public function updated(Page $page): void
    {
        $user = Auth::user();
        $message = 'A page was updated: ' . $page->title;
        $user->notify(new PageEventNotification($message));
        //event(new NotificationAdded($user->id, $message));
        NotificationAdded::dispatch($user->id,$message);
    }

    public function deleted(Page $page): void
    {
        $user = Auth::user();
        $message = 'A page was deleted: ' . $page->title;
        $user->notify(new PageEventNotification($message));
        //event(new NotificationAdded($user->id, $message));
        NotificationAdded::dispatch($user->id,$message);
    }

    public function restored(Page $page): void
    {
        $user = Auth::user();
        $message = 'A page was restored: ' . $page->title;
        $user->notify(new PageEventNotification($message));
        //event(new NotificationAdded($user->id, $message));
        NotificationAdded::dispatch($user->id,$message);
    }

    public function forceDeleted(Page $page): void
    {
        $user = Auth::user();
        $message = 'A page was force deleted: ' . $page->title;
        $user->notify(new PageEventNotification($message));
        //event(new NotificationAdded($user->id, $message));
        NotificationAdded::dispatch($user->id,$message);
    }
}
