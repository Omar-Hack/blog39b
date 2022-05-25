<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Cata;
use App\Models\CataCategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($category) {

        //return $category;

        $category_data = Category::where([
            ['status', '1'],
            ['id', '=', $category],
        ])->first();

        $posts = Post::where([
            ['status', '1'],
            ['category_id', '=', $category],
        ])->orderBy('id', 'Desc')
        ->paginate(12);

        $categories = Category::where([
            ['status', '1'],
        ])->orderBy('id', 'Desc')
        ->get();

        //return $catas;

        return view('Public.CategoryPublications.Home')->with([
            'category_data' => $category_data,
            'posts'         => $posts,
            'categories'    => $categories,
        ]);
    }
}
