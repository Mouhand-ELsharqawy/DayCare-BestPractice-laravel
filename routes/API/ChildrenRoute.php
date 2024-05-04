<?php

use App\Http\Controllers\ChildrenController;
use Illuminate\Support\Facades\Route;

    Route::controller(ChildrenController::class)->middleware('auth:sanctum')->group(function(){
        Route::get('/children','index');
        Route::post('/children','store');
        Route::get('/children/{id}','show');
        Route::patch('/children/{id}','update');
        Route::delete('/children/{id}','destroy');
    });