<?php

use App\Http\Controllers\CurriculumController;
use Illuminate\Support\Facades\Route;

Route::controller(CurriculumController::class) ->middleware('auth:sanctum') ->group(function(){
    Route::get('/curriculum','index');
    Route::post('/curriculum','store');
    Route::get('/curriculum/{id}','show');
    Route::patch('/curriculum/{id}','update');
    Route::delete('/curriculum/{id}','destroy');
});