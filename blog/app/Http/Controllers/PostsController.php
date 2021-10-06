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
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString(),

        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    //restful actions - index, show, create, store, edit, update, destroy
}
