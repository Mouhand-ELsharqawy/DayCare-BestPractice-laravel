<?php

use App\Http\Controllers\FemaleParentController;
use Illuminate\Support\Facades\Route;

Route::controller(FemaleParentController::class) ->middleware('auth:sanctum')->group(function(){
    Route::get('/femaleparent','index');
    Route::post('/femaleparent','store');
    Route::get('/femaleparent/{id}','show');
    Route::patch('/femaleparent/{id}','update');
    Route::delete('/femaleparent/{id}','destroy');
});