<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ProfileController;

//authanticate routes
Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login-user',[AuthController::class,'login'])->name('login_user');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('create-user',[AuthController::class,'createUser'])->name('create_user');
Route::get('logout',[AuthController::class,'signout'])->name('logout');

Route::get('forget-password',[AuthController::class,'showForgetPasswordForm'])->name('show_forget_password');
Route::post('forget-password',[AuthController::class,'submitForgetPasswordForm'])->name('submit_forget_password');
Route::get('reset-password{token}',[AuthController::class,'showResetPasswordForm'])->name('show_reset_password');
Route::post('reset-password',[AuthController::class,'submitResetPasswordForm'])->name('submit_reset_password');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tag/{id}', [HomeController::class, 'tags'])->name('tag');
Route::get('/all-post', [PostsController::class, 'allPosts'])->name('posts.all');
Route::get('/post/{slug}',[PostsController::class,'show'])->name('post.show');

//posts routes
Route::get('/create-post', [PostsController::class, 'create'])->name('post.create');
Route::post('/store-post', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/{id}/edit',[PostsController::class,'edit'])->name('post.edit');
Route::post('/post/{id}/update',[PostsController::class,'update'])->name('post.update');
Route::get('/post/{id}/delete',[PostsController::class,'delete'])->name('post.delete');
Route::get('/search',[PostsController::class,'search'])->name('posts.search');

//comments routes
Route::post('/store-comment', [CommentsController::class, 'store'])->name('comment.store');
Route::get('/comment/{id}/delete',[CommentsController::class,'delete'])->name('comment.delete');
Route::post('/store-reply', [RepliesController::class, 'store'])->name('reply.store');
Route::get('/reply/{id}/delete',[RepliesController::class,'delete'])->name('reply.delete');

Route::get('/profile{id}',[ProfileController::class,'index'])->name('profile.index');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');
