<?php

use App\Http\Controllers\ChildController;
use Illuminate\Support\Facades\Route;

Route::controller(ChildController::class)->middleware('auth:sanctum')->group(function(){
    Route::get('/child','index');
    Route::post('/child','store');
    Route::get('/child/{id}','show');
    Route::patch('/child/{id}','update');
    Route::delete('/child/{id}','destroy');
});