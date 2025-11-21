<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//http://localhost:8000/api/register
Route::post('/register', [UserController::class, 'register']);

//http://localhost:8000/api/login
Route::post('/login', [UserController::class, 'login']);