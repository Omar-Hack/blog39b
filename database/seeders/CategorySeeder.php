<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(10)->create();

        foreach($categories as $category){

            $category->catas()->attach([
                rand(1, 5),
                rand(6, 10),
            ]);
        }
    }
}
