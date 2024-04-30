<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Event;
use Livewire\Component;

class Toast extends Component
{
    public $message = '';
    public $type = '';

    //protected $listeners = ['showToast' => 'show'];
    public function mount()
    {
        Event::listen('showToast', function ($data){
            $this->show($data['message'], $data['type']);
        });
    }

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
