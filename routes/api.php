<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('user')->group(function () {
    Route::get('/getall', [\App\Http\Controllers\UserApiController::class, 'getAllUser']);
    Route::post('/create', [\App\Http\Controllers\UserApiController::class, 'createUserAPI']);
});

Route::prefix('category')->group(function () {
    Route::get('/getall', [\App\Http\Controllers\CategoryApiController::class, 'index']);
    Route::post('/create', [\App\Http\Controllers\CategoryApiController::class, 'createCategory']);

});

Route::prefix('food')->group(function () {
    Route::get('/getall', [\App\Http\Controllers\FoodApiController::class, 'index']);
    Route::post('/create', [\App\Http\Controllers\FoodApiController::class, 'createFood']);
});
Route::prefix('order')->group(function () {
    Route::get('/getall', [\App\Http\Controllers\OrderApiController::class, 'index']);
    Route::post('/create', [\App\Http\Controllers\OrderApiController::class, 'createOrders']);
});

Route::prefix('history')->group(function () {
    Route::get('/getall', [\App\Http\Controllers\HistoryOrderApiController::class, 'index']);
    Route::get("/getbyPhone/{phone}", [\App\Http\Controllers\HistoryOrderApiController::class,'getByPhone']);
    Route::post('/create', [\App\Http\Controllers\HistoryOrderApiController::class, 'createHistory']);
});
