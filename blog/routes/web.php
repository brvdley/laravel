<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //Logging sql queries
   /* \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql, $query->bindings);
    });*/
    //view all posts from the post class and posts view (default route)
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});
        //get a single post based off of the slug from the post view & class
Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});
    //get all posts that are in a category based off of slug and the category class
Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});

    //get all posts that are by a user based off of user id and user class
Route::get('profile/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts
    ]);
});
