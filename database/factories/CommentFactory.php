<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Comment, User, Post};

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'     => User::all()->random()->id,
            'status'      => $this->faker->randomElement(['1', '2']),
            //'post_id'     => Post::all()->random()->id,
            //'parent_id'   => Post::all()->random()->id,
            'content'     => $this->faker->text(100),
        ];
    }
}
