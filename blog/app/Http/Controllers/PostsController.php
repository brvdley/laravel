<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function create() {

        return view('posts.create');

    }

    public function store() {


        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]

        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attributes);

        return redirect('/');
    }

    //restful actions - index, show, create, store, edit, update, destroy
}
