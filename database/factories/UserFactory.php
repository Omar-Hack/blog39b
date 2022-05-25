<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->text('15');
        return [
            'status'            => $this->faker->randomElement(['1', '2']),
            'name'              => $name,
            'image'             => 'storage/post/' . $this->faker->image('public/storage/post', 480, 480, null,false),
            'password'          => Str::random(60), // password
            'email'             => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(20),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
