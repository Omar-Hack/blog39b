<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence(2);
        return [
            'status'   => $this->faker->randomElement(['1', '2']),
            'title'    => $name,
            'slug'     => Str::slug($name),
            'icon'     => $this->faker->imageUrl(16, 16, null, false),
            //'icon'     => 'storage/post/' . $this->faker->image('public/storage/post', 16, 16, null,false),
        ];
    }
}
