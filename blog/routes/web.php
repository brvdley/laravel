<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Middleware\AdminRequired;

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

//default posts route
Route::get('/', [PostsController::class, 'index'])->name('home');

//get a single post based off of the slug from the post view & class
Route::get('post/{post:slug}', [PostsController::class, 'show']);
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

//Register user route
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//login & logout
Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

//newsletter
Route::post('newsletter', NewsletterController::class);

//admin
Route::get('admin/posts/create', [PostsController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [PostsController::class, 'store'])->middleware('admin'); // patch and delete instead of get and post for update or delete






//Other code commented for future reference....
//get all posts that are in a category based off of slug and the category class
/*Route::get('/?category={category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');*/

//get all posts that are by a user based off of user id and user class
/*Route::get('/?author={author:username}', function (User $author) {
    return view('posts.index', [
        'posts' => $author->posts
    ]);
});*/
