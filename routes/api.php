<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


require __DIR__.'/API/ChildrenRoute.php';
require __DIR__.'/API/ChildRoute.php';
require __DIR__.'/API/ConsumableRoute.php';
require __DIR__.'/API/CurriculumRoute.php';
require __DIR__.'/API/EmployeeRoute.php';
require __DIR__.'/API/FemaleRoute.php';
require __DIR__.'/API/MainOfficeRoute.php';
require __DIR__.'/API/MaleParentRoute.php';
require __DIR__.'/API/ProgramRoute.php';
require __DIR__.'/API/SchoolTripRoute.php';
require __DIR__.'/API/ToyRoute.php';
require __DIR__.'/API/WaitingListRoute.php';

