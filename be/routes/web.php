<?php

use App\Jobs\sendEmail;
use App\Jobs\SendEmailResetpassJob;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Queue;



    Route::fallback(function(){
        return response()->json([
            'message' => 'Page Not Found'
        ], 404);
    });
    Route::get('error-message', function (){
        return response()->json([
            'message' => 'Denied'
        ],403);
    });
Route::get('send-mail', function (){
    Queue::connection('mongodb')->push(new SendEmailResetpassJob());
//    dispatch(new SendEmailResetpassJob());
    dd('Email sent successfully');
});
