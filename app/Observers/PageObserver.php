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


}
