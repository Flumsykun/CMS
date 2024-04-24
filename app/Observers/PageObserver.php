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
       //
    }
    public function updated(Page $page): void
    {
        //
    }

    public function deleted(Page $page): void
    {
        //
    }

    public function restored(Page $page): void
    {
        //
    }

    public function forceDeleted(Page $page): void
    {
        //
    }
}
