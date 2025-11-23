<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//http://localhost:8000/api/user
Route::get('/user', function (Request $request) {return $request->user();})->middleware('auth:sanctum');

//http://localhost:8000/api/register
Route::post('/register', [UserController::class, 'register']);

//http://localhost:8000/api/login
Route::post('/login', [UserController::class, 'login']);

//http://localhost:8000/api/logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

//http://localhost:8000/api/posts
Route::get('/posts', [PostController::class, 'index'])->middleware('auth:sanctum');

Route::post('/posts', [PostController::class, 'store'])->middleware('auth:sanctum');

//http://localhost:8000/api/posts/{id}
Route::put('/posts/{id}', [PostController::class, 'update'])->middleware('auth:sanctum');


