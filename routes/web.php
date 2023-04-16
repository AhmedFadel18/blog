<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Route as RoutingRoute;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{id}', [HomeController::class, 'tags'])->name('category');
Route::get('/all-post', [PostsController::class, 'allPosts'])->name('posts.all');
Route::get('/create-post', [PostsController::class, 'create'])->name('post.create');
Route::post('/store-post', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/{slug}',[PostsController::class,'show'])->name('post.show');
Route::get('/post/{id}/edit',[PostsController::class,'edit'])->name('post.edit');
Route::post('/post/{id}/update',[PostsController::class,'update'])->name('post.update');
Route::get('/post/{id}/delete',[PostsController::class,'delete'])->name('post.delete');
Route::get('/search',[PostsController::class,'search'])->name('posts.search');
Route::post('/store-comment', [CommentsController::class, 'store'])->name('comment.store');
Route::get('/comment/{id}/delete',[CommentsController::class,'delete'])->name('comment.delete');
Route::post('/store-reply', [RepliesController::class, 'store'])->name('reply.store');
Route::get('/reply/{id}/delete',[RepliesController::class,'delete'])->name('reply.delete');
Route::get('/profile{id}',[ProfileController::class,'index'])->name('profile.index');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');
