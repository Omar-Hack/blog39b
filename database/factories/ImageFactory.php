<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status'      => $this->faker->randomElement(['1', '2']),
            'post_id'     => Post::all()->random()->id,
            'url'         => 'storage/post/' . $this->faker->image('public/storage/post', 480, 480, null,false),
        ];
    }
}
