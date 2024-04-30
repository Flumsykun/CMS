<?php

namespace App\Livewire;

use Livewire\Component;

class Toast extends Component
{
    public $message = '';
    public $type = '';

    protected $listeners = ['showToast' => 'show'];

    public function show($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }
    public function render()
    {
        return view('livewire.toast');
    }
}
