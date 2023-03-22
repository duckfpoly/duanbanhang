<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RateController;
use Illuminate\Support\Facades\Route;

Route::resource('categories',CategoryController::class);
Route::resource('products', ProductController::class)->only('index','show');
Route::resource('rates', RateController::class)->only('index');
Route::resource('blogs', BlogController::class)->only('index');
Route::fallback(function(){ return response()->json(['message' => 'Page Not Found'], 404); });
