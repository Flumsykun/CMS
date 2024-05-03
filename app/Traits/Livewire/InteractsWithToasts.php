<?php
//
//namespace App\Traits\Livewire;
//
//use App\Livewire\Toast;
//use Illuminate\Validation\ValidationException;
//use Livewire\Form;
//
//define('ERROR', 'errors');
//define('SUCCESS', 'success');
//define('WARNING', 'warning');
//
//trait  InteractsWithToasts
//{
//    public function successToast($message = ''): void
//    {
//        $this->customToast(SUCCESS, $message);
//    }
//
//    public function errorToast($message = ''): void
//    {
//        if ($message instanceof \Exception) {
//            $message = $message->getMessage();
//        }
//
//        $this->customToast(ERROR, $message);
//    }
//    //
//    //public function warningToast($message = ''): void
//    //{
//    //    $this->customToast(WARNING, $message);
//    //}
//
//    public function customToast(string $type = SUCCESS, $message = ''): void
//    {
//        $this->dispatch('toast', $type, $message)->to(Toast::class);
//    }
//
//    public function sessionToast(string $type = SUCCESS, $message = ''): void
//    {
//        session()->flash($type, $message);
//    }
//
//    public function validate($rules = null, $messages = [], $attributes = [])
//    {
//        try {
//            return parent::validate($rules, $messages, $attributes);
//        } catch (ValidationException $e) {
//            $this->errorToast($e);
//
//            throw $e;
//        }
//    }
//
//    public function validateOnly($field, $rules = null, $messages = [], $attributes = [], $dataOverrides = [])
//    {
//        try {
//            return parent::validateOnly($field, $rules, $messages, $attributes, $dataOverrides);
//        } catch (ValidationException $e) {
//            $this->errorToast($e);
//
//            throw $e;
//        }
//    }
//}
