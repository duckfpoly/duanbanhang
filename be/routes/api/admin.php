<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('demo',function(){
   return 'admin api demo';
});
Route::resource('categories',CategoryController::class);
Route::resource('products',ProductController::class);
Route::resource('users', UserController::class);
Route::resource('orders',OrderController::class);
Route::resource('blogs',BlogController::class);
Route::delete('logout',                 [AuthController::class, 'logout']);


Route::fallback(function(){ return response()->json(['message' => 'Page Not Found'], 404); });
