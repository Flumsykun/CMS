<?php

namespace App\Observers;

use App\Models\Page;
use Illuminate\Support\Facades\Event;


/**
 * @method dispatchBrowserEvent(string $string, string[] $array)
 */
class PageObserver
{
    public function created(Page $page): void
    {
        Event::dispatch('showToast', ['message' => 'Page created successfully!', 'type' => 'success']);
    }


    public function updated(Page $page): void
    {
        Event::dispatch('showToast', ['message' => 'Page updated successfully!', 'type' => 'success']);
    }

    public function deleted(Page $page): void
    {
        Event::dispatch('showToast', ['message' => 'Page deleted successfully!', 'type' => 'success']);
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
