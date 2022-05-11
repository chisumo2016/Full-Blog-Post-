<?php

namespace Database\Factories;

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
        $title = $this->faker->sentence;
        $slug = Str::slug($title);
        return [
            'title'         => $title,
            'slug'          =>  $slug,
            'avatar'        =>  $this->faker->imageUrl(900, 300),
            'description'   =>  '<p>' . implode('</p><p>', $this->faker->paragraphs(6)) . '</p>',
            'quote'         =>  $this->faker->sentence,
            'likes'         =>  1,
            'views'         =>  1,
            'status'        =>  'active',
            'user_id'       => User::factory(),
        ];
    }
}
