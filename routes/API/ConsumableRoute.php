<?php

use App\Http\Controllers\ConsumableController;
use Illuminate\Support\Facades\Route;

Route::controller(ConsumableController::class) ->middleware('auth:sanctum') ->group(function(){
    Route::get('/consumable','index');
    Route::post('/consumable','store');
    Route::get('/consumable/{id}','show');
    Route::patch('/consumable/{id}','update');
    Route::delete('/consumable/{id}','destroy');
});