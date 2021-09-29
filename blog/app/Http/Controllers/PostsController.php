<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostsController extends Controller
{
    public function index() {
        //Logging sql queries
        /* \Illuminate\Support\Facades\DB::listen(function ($query) {
            logger($query->sql, $query->bindings);
        });*/
        //view all posts from the post class and posts view (default route)
        return view('posts', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => Category::firstWhere('slug', request('category'))
        ]);
    }

    public function show(Post $post) {
        return view('post', [
            'post' => $post
        ]);
    }
}
