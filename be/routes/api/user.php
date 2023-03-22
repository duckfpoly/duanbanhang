<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('changed_pass', [UserController::class,'changed_pass']);
Route::post('changed_info', [UserController::class,'changed_info']);
Route::get('profiles',      [UserController::class,'information']);
Route::post('add-order',    [OrderController::class,'store']);
Route::get('get-cart',      [CartController::class,'getCart']);
Route::post('add-cart',     [CartController::class,'addCart']);
Route::post('add-rate',     [RateController::class,'addRate']);

Route::fallback(function(){ return response()->json(['message' => 'Page Not Found'], 404); });
