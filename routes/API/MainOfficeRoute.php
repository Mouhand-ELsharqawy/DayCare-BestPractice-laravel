<?php

use App\Http\Controllers\MainOfficeController;
use Illuminate\Support\Facades\Route;

Route::controller(MainOfficeController::class) ->middleware('auth:sanctum')->group(function(){
    Route::get('/mainoffice','index');
    Route::post('/mainoffice','store');
    Route::get('/mainoffice/{id}','show');
    Route::patch('/mainoffice/{id}','update');
    Route::delete('/mainoffice/{id}','destroy');
});