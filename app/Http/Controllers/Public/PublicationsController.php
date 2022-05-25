<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cata;
use App\Models\CataCategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function show(){
        $posts = Post::where([
            ['status', '1'],
        ])->orderBy('id', 'Desc')
        ->paginate(12);

        $categories = Category::where([
            ['status', '1'],
        ])->orderBy('id', 'Desc')
        ->get();

        return view('Public.Publications.Home')->with([
            'posts'      => $posts,
            'categories' => $categories,
        ]);
    }
}
