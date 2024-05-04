<?php

use App\Http\Controllers\WaitingListController;
use Illuminate\Support\Facades\Route;

Route::controller(WaitingListController::class)  ->middleware('auth:sanctum')->group(function(){
    Route::get('/waiting','index');
    Route::post('/waiting','store');
    Route::get('/waiting/{id}','show');
    Route::patch('/waiting/{id}','update');
    Route::delete('/waiting/{id}','destroy');
});