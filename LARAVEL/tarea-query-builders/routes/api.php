<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rutas para las consultas SQL
Route::post('/insert-data', [OrderController::class, 'insertSampleData']); // POST
Route::get('/user-orders/{userId?}', [OrderController::class, 'getUserOrders']);
Route::get('/orders-with-users', [OrderController::class, 'getOrdersWithUserInfo']);
Route::get('/orders-in-range', [OrderController::class, 'getOrdersInRange']);
Route::get('/users-starting-with-r', [OrderController::class, 'getUsersStartingWithR']);
Route::get('/order-count/{userId?}', [OrderController::class, 'getOrderCountForUser']);
Route::get('/orders-ordered-by-total', [OrderController::class, 'getOrdersWithUsersOrderedByTotal']);
Route::get('/total-sum', [OrderController::class, 'getTotalSum']);
Route::get('/cheapest-order', [OrderController::class, 'getCheapestOrder']);
Route::get('/orders-grouped-by-user', [OrderController::class, 'getOrdersGroupedByUser']);
Route::get('/run-all-queries', [OrderController::class, 'runAllQueries']);