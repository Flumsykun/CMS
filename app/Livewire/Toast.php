<?php

namespace App\Livewire;

use App\helpers\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class Toast extends Component
{
    public string $message = '';
    public string $type = '';

    protected $listeners = ['showToast' => 'show'];

    protected array $toastTypes = [
        'errors' => 'error',
        'success' => 'success',

    ];

    protected array $toastIcons = [
        'errors' =>
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32" style="overflow:visible;enable-background:new 0 0 32 32" viewBox="0 0 32 32" width="32" xml:space="preserve"><g><g id="Error_1_"><g id="Error"><circle cx="16" cy="16" id="BG" r="16" style="fill:#D72828;"/>
                <path d="M14.5,25h3v-3h-3V25z M14.5,6v13h3V6H14.5z" id="Exclamatory_x5F_Sign" style="fill:#E6E6E6;"/></g></g></g>
            </svg>',
        'success' =>
            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="32" style="overflow:visible;enable-background:new 0 0 32 32" viewBox="0 0 32 32" width="32" xml:space="preserve"><g><g id="Complete_x5F_Symbol_1_"><g id="Complete_x5F_Symbol"><circle cx="16" cy="16" id="BG" r="16" style="fill:#19D873;"/>
                <polygon id="Done_x5F_Symbol" points="14,17.9 14,17.9 14,17.9 10.1,14 8,16.1         14,22.1 24,12.1 21.9,10 " style="fill:#E6E6E6;"/></g></g></g>
            </svg>',
    ];

    public array $toastList = [];

    public function mount()
    {
        $this->refreshSession();
    }

    public function refreshSession(): void
    {
        $this->refreshToasts(session('success'), session('errors'));
    }

    public function refreshToasts($success = null, $errors = null)
    {
        // Initialize an empty array to hold the toasts
        $keyedToasts = [];

        // If there is a success message, add it to the toasts array with the key 'success'
        if (! empty($success)) {
            $keyedToasts['success'] = $success;
        }

        // If there are error messages, add them to the toasts array with the key 'errors'
        // If the errors are not an array, convert them to an array
        if (! empty($errors)) {
            $keyedToasts['errors'] = is_array($errors)
                ? $errors
                : $errors->toArray();
        }

        // Loop through the toasts array
        foreach ($keyedToasts as $type => $toast) {
            // If the toast type is 'errors', loop through the errors
            if ($type == 'errors') {
                foreach ($toast as $errors) {
                    foreach ($errors as $error) {
                        // For each error, call the error method to display the error toast
                        $this->error($error);
                    }
                }

                // Skip to the next iteration of the loop
                continue;
            }

            // If the toast type is not 'errors', it must be 'success'
            // Call the success method to display the success toast
            $this->success($toast);
        }
    }

    #[On('success')]
    public function success($message = '', $alwaysShown = false)
    {
        $this->toast('success', $message);
    }

    #[On('error')]
    public function error($message = '', $alwaysShown = false)
    {
        $this->toast('errors', $message);
    }

    #[On('toast')]
    public function toast($type, $message = '', $alwaysShown = false)
    {
        $toast = [
            'type' => $this->toastTypes[$type],
            'icon' => $this->toastIcons[$type] ?? '',
            'title' => Str::title($this->toastTypes[$type]),
            'message' => $message,
            'alwaysShown' => $alwaysShown,
            'uuid' => (string) Str::uuid(),
        ];

        $this->dispatch('toast-fired', $toast);
        $this->toastList[] = $toast;
    }

    //public function show($message, $type)
    //{
    //    //dd('Event received', $this->message, $this->type);
    //    $this->message = $message;
    //    $this->type = $type;
    //}

    public function render()
    {
        //dd('component is being rendered');
        return view('livewire.toast');
    }
}
