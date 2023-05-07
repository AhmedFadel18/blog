<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsersController;

//authanticate routes
Route::group(['prefix'=>'admin','middleware'=>'guest:admin'],function(){

Route::get('login',[AdminAuthController::class,'index'])->name('admin.login');
Route::post('login-user',[AdminAuthController::class,'login'])->name('admin.login_user');
Route::get('logout',[AdminAuthController::class,'logout'])->name('admin.logout');

Route::get('forget-password',[AdminAuthController::class,'showForgetPasswordForm'])->name('admin.show_forget_password');
Route::post('forget-password',[AdminAuthController::class,'submitForgetPasswordForm'])->name('admin.submit_forget_password');
Route::get('reset-password{token}',[AdminAuthController::class,'showResetPasswordForm'])->name('admin.show_reset_password');
Route::post('reset-password',[AdminAuthController::class,'submitResetPasswordForm'])->name('admin.submit_reset_password');

//admin routes

});
Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

Route::get('dashboard',[DashboardController::class,'index'])->name('admin.dashboard');

//tags routes
Route::get('tags',[TagsController::class,'index'])->name('admin.tags');
Route::get('tags/create-tag',[TagsController::class,'create'])->name('admin.tags.create');
Route::post('tags/store-tag',[TagsController::class,'store'])->name('admin.tags.store');
Route::get('tags/edit/{id}',[TagsController::class,'edit'])->name('admin.tags.edit');
Route::post('tags/update/{id}',[TagsController::class,'update'])->name('admin.tags.update');
Route::get('tags/delete/{id}',[TagsController::class,'delete'])->name('admin.tags.delete');
Route::get('tags/tag-posts/{id}',[TagsController::class,'showTagPosts'])->name('admin.posts.show_tag_posts');

//posts routes
Route::get('posts',[PostsController::class,'index'])->name('admin.posts');
Route::get('posts/publish/{id}',[PostsController::class,'publish'])->name('admin.posts.publish');
Route::get('posts/{id}',[PostsController::class,'delete'])->name('admin.posts.delete');
Route::get('posts/show-post/{id}',[PostsController::class,'showPost'])->name('admin.post.show');

//users routes
Route::get('users',[UsersController::class,'index'])->name('admin.users');
Route::get('users/user-posts/{id}',[UsersController::class,'showUserPosts'])->name('admin.posts.show_user_posts');
Route::get('users/make-admin/{id}',[UsersController::class,'makeAdmin'])->name('admin.make_admin');
Route::get('users/delete-admin/{id}',[UsersController::class,'deleteAdmin'])->name('admin.delete_admin');
Route::get('users/block-user/{id}',[UsersController::class,'blockUser'])->name('admin.user.block');

//settings routes
Route::get('settings/',[SettingsController::class,'index'])->name('admin.settings');
Route::get('settings/edit/',[SettingsController::class,'generalEdit'])->name('admin.settings.edit');
Route::post('settings/update/',[SettingsController::class,'generalUpdate'])->name('admin.settings.update');
});
