<?php

namespace App\Livewire\UI\Buttons;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Button extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.ui.buttons.button');

        //return view('livewire.ui.buttons.button')->with([
        //    'author' => Auth::user()->name,
        //]);
    }
}
