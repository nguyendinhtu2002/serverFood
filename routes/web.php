<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',function (){
    return view('layouts.base');
})->name('home');

Route::prefix('/food')->group(function () {
    Route::get('/',[\App\Http\Controllers\FoodController::class,'index'])->name('food.index');

    Route::get('create', [\App\Http\Controllers\FoodController::class,'create'])->name('food.create');
    Route::post('store', [\App\Http\Controllers\FoodController::class,'store'])->name('food.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\FoodController::class,'edit'])->name('food.edit');
    Route::put('/update/{id}', [\App\Http\Controllers\FoodController::class,'update'])->name('food.update');

    Route::delete('/delete/{id}', [\App\Http\Controllers\FoodController::class,'delete'])->name('food.delete');
});
Route::get("/test",[\App\Http\Controllers\UserController::class,'getAllUSer']);
Route::post("/create/user",[\App\Http\Controllers\UserController::class,'createUserAPI']);
Route::prefix('/user')->group(function () {
    Route::get('/',[\App\Http\Controllers\UserController::class,'index'])->name('user.index');

    Route::get('create', [\App\Http\Controllers\UserController::class,'create'])->name('user.create');
    Route::post('store', [\App\Http\Controllers\UserController::class,'store'])->name('user.store');

    Route::get('/edit/{phone}', [\App\Http\Controllers\UserController::class,'edit'])->name('user.edit');
    Route::put('/update/{phone}', [\App\Http\Controllers\UserController::class,'update'])->name('user.update');

    Route::delete('/delete/{phone}', [\App\Http\Controllers\UserController::class,'delete'])->name('user.delete');
});

Route::prefix('/category')->group(function () {
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

    Route::get('create', [\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('store', [\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');

    Route::get('/edit/{id}', [\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::put('/update/{id}', [\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

    Route::delete('/delete/{id}', [\App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');
});

Route::prefix('/order')->group(function () {
    Route::get('/',[\App\Http\Controllers\OrderController::class,'index'])->name('order.index');

    Route::get('/edit/{id}', [\App\Http\Controllers\OrderController::class,'edit'])->name('order.edit');
    Route::put('/update/{id}', [\App\Http\Controllers\OrderController::class,'update'])->name('order.update');

    Route::delete('/delete/{id}', [\App\Http\Controllers\OrderController::class,'delete'])->name('order.delete');
});

Route::prefix('/historyOrder')->group(function () {
    Route::get('/',[\App\Http\Controllers\HistoryOrderController::class,'index'])->name('historyOrder.index');


    Route::get('/edit/{order_id}/{user_phone}', [\App\Http\Controllers\HistoryOrderController::class,'edit'])->name('historyOrder.edit');
    Route::put('/update/{order_id}/{user_phone}', [\App\Http\Controllers\HistoryOrderController::class,'update'])->name('historyOrder.update');

    Route::delete('/delete/{order_id}/{user_phone}', [\App\Http\Controllers\HistoryOrderController::class,'delete'])->name('historyOrder.delete');
});
