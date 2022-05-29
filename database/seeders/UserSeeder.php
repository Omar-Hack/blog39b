<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        User::create([
            'status'   => '1',
            'name'     => 'omar',
            'image'    => 'https://ecuadorendirecto.com/wp-content/uploads/2020/12/03-taylor-swift-press-cr-Beth-Garrabrant-2020-billboard-1548-1607617377-compressed.jpg',
            'password' => bcrypt('12qwaszx'),
            'email'    => 'omar@gmail.com',
            'email_verified_at' => now(),
            'remember_token'    => Str::random(20),
        ]);
    }
}
