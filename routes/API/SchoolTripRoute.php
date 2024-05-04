<?php

use App\Http\Controllers\SchoolTripController;
use Illuminate\Support\Facades\Route;

Route::controller(SchoolTripController::class)  ->middleware('auth:sanctum')->group(function(){
    Route::get('/schooltrip','index');
    Route::post('/schooltrip','store');
    Route::get('/schooltrip/{id}','show');
    Route::patch('/schooltrip/{id}','update');
    Route::delete('/schooltrip/{id}','destroy');
});