<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;
use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['nama'=> 'Ferdiansyah', 'title' => 'About']);
});

Route::get('/posts', function () {
    $posts = Post::latest()->paginate(5);
    return view('posts', ['title' => 'Blog', 'posts' => $posts]);
});

Route::get('/posts/{post:slug}', function(Post $post) {;
    // Return the view with the post details
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});


Route::get('/authors/{user:username}', function(User $user) {;
    // $posts = $user->posts->load('category', 'author');
    // Return the view with the post details
    return view('posts', ['title' => count($user->posts) . ' Articles by '. $user->name, 'posts' 
    => $user->posts]);
});

Route::get('/categories/{category:slug}', function(Category $category) {;
    // $posts = $category->posts->load('category', 'author');
    // Return the view with the post details

    return view('posts', ['title' => ' Article in Category : '. $category->name, 'posts' => $category->posts]);
});
