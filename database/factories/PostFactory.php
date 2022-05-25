<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Post, Category, User};
use Illuminate\Support\Str;
use Jenssegers\Date\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->text('60');
        return [
            'status'        => $this->faker->randomElement(['1', '2']),
            'user_id'       => User::all()->random()->id,
            'title'         => $name,
            'slug'          => Str::slug($name) . "-" . Date::now(),
            'date'          => Date::now()->format('l j F Y g:i:s a'),
            'image'         => 'storage/post/' . $this->faker->image('public/storage/post', 480, 480, null,false),
            'video'         => '',
            'category_id'   => Category::all()->random()->id,
            'description'   => $this->faker->text(130),
            'content'       => $this->faker->text(300),
        ];
    }
}
