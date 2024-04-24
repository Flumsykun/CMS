<?php

namespace App\Livewire\UI\Pages;

use Livewire\Component;

class Banner extends Component
{

    public $style;
    public $message;

    public function mount($style = 'success', $message = '')
    {
        $this->style = $style;
        $this->message = $message;
    }

    public function render()
    {
        return view('livewire.ui.pages.banner');
    }
}
