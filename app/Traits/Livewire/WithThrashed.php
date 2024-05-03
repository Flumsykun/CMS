<?php
//
//namespace App\Traits\Livewire;
//
//use App\Helpers\Str;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Arr;
//use Livewire\Drawer\Utils;
//
//trait WithThrashed
//{
//    use InteractsWithToasts;
//
//    public array $thrashed = [];
//
//    public function inBin($item, $property = null): void
//    {
//        if (! empty($property)) {
//            //dd($property, $this->getPropertyValue($property));
//
//            data_forget($this, Utils::afterFirstDot($property));
//        }
//
//        $this->thrashed[] = $item;
//
//        $message = ! empty($property = Str::of(Utils::beforeFirstDot($property))->singular()->title())
//            ? "{$property} in pullenbak gezet."
//            : 'item in pullenbak gezet.';
//
//        $this->successToast($message);
//    }
//
//    public function clearBin(): void
//    {
//        foreach ($this->thrashed as $i => $thrash) {
//            $title = $i;
//
//            if ($thrash instanceof Model) {
//                $title = ($thrash->title ?? $thrash->name) ?: 'is';
//
//                $thrash->delete();
//            }
//
//            Arr::forget($this->thrashed, $i);
//
//            $this->sessionToast(SUCCESS, basename(parent::class) .": {$title} verwijderd");
//        }
//    }
//}
