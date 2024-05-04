<?php

use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

Route::controller(ProgramController::class) ->middleware('auth:sanctum') ->group(function(){
    Route::get('/program','index');
    Route::post('/program','store');
    Route::get('/program/{id}','show');
    Route::patch('/program/{id}','update');
    Route::delete('/program/{id}','destroy');
});