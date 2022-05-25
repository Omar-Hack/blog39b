<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(100)->create();

        foreach($posts as $post){

            Comment::factory(5)->create([
                'status'      => '1',
                'post_id'     => $post->id,
                'parent_id'   => '1',
                'content'     => $post->content,
            ]);
        }
    }
}
