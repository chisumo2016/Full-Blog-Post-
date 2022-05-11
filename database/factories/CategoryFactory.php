<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->text;
        $slug = Str::slug($name);
        return [
            'name'         =>   $name,
            'slug'          =>  $slug,
            'avatar'        =>  $this->faker->imageUrl(900, 300),
            'status'        =>  'active',

        ];
    }
}
