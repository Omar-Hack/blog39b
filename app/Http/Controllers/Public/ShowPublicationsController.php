<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cata;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowPublicationsController extends Controller
{
    public function show($post){

        //return $post;

        $post = Post::where([
            ['status', '1'],
            ['id', '=' ,$post],
        ])->first();

        $posts = Post::where([
            ['status', '1'],
            ['category_id', '>', $post->category_id],
        ])->orderBy('id', 'Asc')
        ->paginate(3);

        $category = Category::where([
            ['status', '1'],
            ['id', $post->category_id],
        ])->first();

        $categories = Category::where([
            ['status', '1'],
        ])->orderBy('id', 'Desc')
        ->get();

        $images = Image::where([
            ['status', '1'],
            ['post_id', '=', $post->id],
        ])->orderBy('id', 'Desc')
        ->get();

        $comments = $post->comments()
            ->where('status', '1')
            ->latest('id')
            ->get();

        //return $post;

        return view('Public.ShowPublications.Home')->with([
            'post'       => $post,
            'posts'      => $posts,
            'category'   => $category,
            'categories' => $categories,
            'images'     => $images,
            'comments'   => $comments,
        ]);
    }
}
