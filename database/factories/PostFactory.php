<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
               'title' => $this->faker->unique()->name,
               'slug'  => Str::slug($this->faker->title(), '-'),
               'image'  => $this->faker->imageUrl(640,480),
               'description'  => $this->faker->text(60),
               'category_id'  => 2,
               'user_id'  => 2,
               'slug'  => $this->faker->slug,
        ];
    }
}
