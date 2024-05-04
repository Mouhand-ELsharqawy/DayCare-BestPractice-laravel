<?php

use App\Http\Controllers\ToyController;
use Illuminate\Support\Facades\Route;

Route::controller(ToyController::class) ->middleware('auth:sanctum')->group(function(){
    Route::get('/toy','index');
    Route::post('/toy','store');
    Route::get('/toy/{id}','show');
    Route::patch('/toy/{id}','update');
    Route::delete('/toy/{id}','destroy');
});