<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    protected $model = Page::class;

    public function definition()
    {
        $title = $this->faker->realText(10);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->realText(50),
        ];
    }
}
