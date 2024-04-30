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
        $eventData = ['message' => 'Page created successfully!', 'type' => 'success'];
        Event::dispatch('showToast', $eventData);
        //dd('Event dispatched', $eventData);
    }


    public function updated(Page $page): void
    {
        $eventData = ['message' => 'Page updated successfully!', 'type' => 'success'];
        Event::dispatch('showToast', $eventData);
        //dd('Event dispatched', $eventData);
    }


    public function deleted(Page $page): void
    {
        $eventData = ['message' => 'Page deleted successfully!', 'type' => 'success'];
        Event::dispatch('showToast', $eventData);
        //dd('Event dispatched', $eventData);
    }


}
