<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique->text(15);
        $slug = Str::slug($title);
        $mini_description = $this->faker->text(30);
        $description = $this->faker->text(100);
        $is_published = (bool)rand(0, 1);

        return compact('title', 'slug', 'mini_description', 'description', 'is_published');
    }
}
