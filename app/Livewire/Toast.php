<?php

namespace App\Livewire;

use App\helpers\Str;
use Illuminate\Support\Facades\Event;
use Livewire\Component;

class Toast extends Component
{
    public $message = '';
    public $type = '';

    protected $listeners = ['showToast' => 'show'];

    public function show($message, $type)
    {
        //dd('Event received', $this->message, $this->type);
        $this->message = $message;
        $this->type = $type;
    }
    public function render()
    {
        //dd('component is being rendered');
        return view('livewire.toast');
    }
}
