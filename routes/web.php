<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController ;
use App\Http\Controllers\UserController ;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {return view('welcome');});
// Route::get('posts',[PostsController::class,"index"] )->name("posts.index");
// Route::get("/posts/create",[PostsController::class,"create"])->name("posts.create");
// Route::post('/posts',[PostsController::class,"store"] )->name("posts.store");
// Route::put('/posts/{post}',[PostsController::class,"update"] )->name("posts.update");
// Route::get("/posts/{post}",[PostsController::class,"show"] )->name("posts.show");
// Route::get('/posts/{post}/edit',[PostsController::class,"edit"] )->name("posts.edit");
// Route::delete('/posts/{post}',[PostsController::class,"destroy"] )->name("posts.destroy");
// Route::delete('/posts/{post}',[PostsController::class,"destroy"] )->name("posts.destroy");
// Route::get("/posts/create",[PostsController::class,"create"] );
// Route::middleware([Authenticate::class])->group(function () { });
Auth::routes();
Route::resource("posts",PostController::class)->middleware("auth");
Route::get('/',[PostController::class,"index"])->middleware("auth");
Route::get("/user/posts/view/{user}", [UserController::class,"userPosts"])->name("user.posts");
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


