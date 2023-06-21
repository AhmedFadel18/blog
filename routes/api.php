<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('show-user',[UsersController::class,'index']);

Route::get('show-posts',[PostsController::class,'index']);
Route::get('show-posts/{id}',[PostsController::class,'show']);
Route::post('store-post',[PostsController::class,'store'])->middleware('auth:sanctum');
Route::put('update-post/{id}',[PostsController::class,'update'])->middleware('auth:sanctum');
Route::delete('delete-post/{id}',[PostsController::class,'delete'])->middleware('auth:sanctum');

