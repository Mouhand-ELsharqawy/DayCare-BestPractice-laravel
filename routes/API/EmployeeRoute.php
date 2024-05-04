<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(EmployeeController::class) ->middleware('auth:sanctum') ->group(function(){
    Route::get('/employee','index');
    Route::post('/employee','store');
    Route::get('/employee/{id}','show');
    Route::patch('/employee/{id}','update');
    Route::delete('/employee/{id}','destroy');
});