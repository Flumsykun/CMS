<?php

namespace App\Livewire\UI\Pages;

use App\Models\Page;
use Illuminate\Support\str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;
//use App\Traits\Livewire\InteractsWithToasts;
use Livewire\WithPagination;

class Pages extends Component
{
    //use InteractsWithToasts;

    use WithPagination;
    public $modalFormVisible = false;
    public $modalConfirmDeleteVisible = false;
    public $modelId;
    public $slug;
    public $title;
    public $content;
    public $isSetToDefaultHomePage;
    public $isSetToDefaultNotFoundPage;
    /**
     * The validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'slug' => ['required', Rule::unique('pages', 'slug')->ignore($this->modelId)],
            'content' => 'required',
        ];
    }

    /**
     * Livewire mount function to reset pagination
     *
     * @return void
     */
    public function mount(): void
    {
        //Resets the pagination after reloading the page
        $this->resetPage();
    }

    /**
     * Runs everytime the title
     * variable is updated
     *
     * @param mixed $value
     * @return void
     */
    public function updatedTitle(mixed $value): void
    {
       $this->slug =  Str::slug($value);
    }

    /**
     * The create function.
     *
     * @return void
     */
    public function create()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::create($this->modelData());
        $this->modalFormVisible = false;
        $this->reset();

//        $this->dispatchBrowserEvent('event-notification', [
//            'eventName' => 'New Page',
//            'eventMessage' => 'Another page has been created!',
//        ]);
    }

    /**
     * The read function
     *
     * @return void
     */
    public function read()
    {
        return Page::paginate(5);
    }

    /**
     * The update function.
     *
     * @return void
     */
    public function update()
    {
        $this->validate();
        $this->unassignDefaultHomePage();
        $this->unassignDefaultNotFoundPage();
        Page::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;

//        $this->dispatchBrowserEvent('event-notification', [
//            'eventName' => 'Updated Page',
//            'eventMessage' => 'There is a page (' . $this->modelId . ') that has been updated!',
//        ]);
    }


    /**
     * The delete function.
     *
     * @return void
     */
    public function delete()
    {
        Page::destroy($this->modelId);
        $this->modalConfirmDeleteVisible = false;
        $this->resetPage();

//        $this->dispatchBrowserEvent('event-notification', [
//            'eventName' => 'Deleted Page',
//            'eventMessage' => 'The page (' . $this->modelId . ') has been deleted!',])
    }

    /**
     * Runs everytime the isSetToDefaultHomePage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultHomePage(): void
    {
        $this->isSetToDefaultNotFoundPage = null;
    }

    /**
     * Runs everytime the isSetToDefaultNotFoundPage
     * variable is updated.
     *
     * @return void
     */
    public function updatedIsSetToDefaultNotFoundPage(): void
    {
        $this->isSetToDefaultHomePage = null;
    }


    /**
     * Show the form modal
     * of the create function
     *
     * @return void
     */
    public function createShowModal(): void
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
    }

    /**
     * Shows the form modal
     * in the update mode
     *
     * @param $id
     * @return void
     */
    public function updateShowModal($id): void
    {
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        $this->modalFormVisible = true;
        $this->loadModel();
    }

    /**
     * Shows the delete confirmation
     * modal of the delete function
     *
     * @param mixed $id
     * @return void
     */
    public function deleteShowModal($id): void
    {
        $this->modelId = $id;
        $this->modalConfirmDeleteVisible = true;
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel(): void
    {
        $data = Page::find($this->modelId);
        $this->title = $data->title;
        $this->slug = $data->slug;
        $this->content = $data->content;
        $this->isSetToDefaultHomePage = !$data->is_default_home ? null : true;
        $this->isSetToDefaultNotFoundPage = !$data->is_default_not_found ? null : true;
    }
    /**
     * Data array
     * for model
     * @return array
     */
    /**
     * The data for the model mapped
     * in this component.
     *
     * @return array
     */
    public function modelData() : array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'is_default_home' => $this->isSetToDefaultHomePage,
            'is_default_not_found' => $this->isSetToDefaultNotFoundPage,
        ];
    }


    /**
     * Resets all the variables to
     * null
     *
     * @return void
     */
    public function resetVars(): void
    {
        $this->modelId = null;
        $this->title = null;
        $this->slug = null;
        $this->content = null;

    }

//    /**
//     * Generates a url slug
//     * base on the title
//     *
//     * @param mixed $value
//     * @return void
//     */
//    private function generateSlug(mixed $value): void
//    {
//        $process1 = str_replace(' ', '-', $value);
//        $process2 = strtolower($process1);
//        $this->slug = $process2;
//    }

    /**
     * Unassigns the default home page in the database table
     *
     * @return void
     */
    private function unassignDefaultHomePage()
    {
        if ($this->isSetToDefaultHomePage != null) {
            Page::where('is_default_home', true)->update([
                'is_default_home' => false,
            ]);
        }
    }

    /**
     * Unassigns the default 404 page in the database table
     *
     * @return void
     */
    private function unassignDefaultNotFoundPage()
    {
        if ($this->isSetToDefaultNotFoundPage != null) {
            Page::where('is_default_not_found', true)->update([
                'is_default_not_found' => false,
            ]);
        }
    }

//    /**
//     * Dispatch event
//     *
//     * @return void
//     */
//    public function dispatchEvent():void
//    {
//        $this->dispatchEvent('event-notification', [
//            'eventName' => 'Sample Event',
//            'eventMessage' => 'You have a sample event notification!',
//        ]);
//    }
//

    /**
     * The live wire render function.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render(): view
    {
        return view('livewire.ui.pages.pages', [
            'data' => $this->read(),
        ]);
    }
}
