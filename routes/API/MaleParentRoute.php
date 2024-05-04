<?php

use App\Http\Controllers\MaleParentController;
use Illuminate\Support\Facades\Route;


Route::controller(MaleParentController::class) ->middleware('auth:sanctum')->group(function(){
    Route::get('/maleparent','index');
    Route::post('/maleparent','store');
    Route::get('/maleparent/{id}','show');
    Route::patch('/maleparent/{id}','update');
    Route::delete('/maleparent/{id}','destroy');
});