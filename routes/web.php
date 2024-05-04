<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'welcome';
});

require __DIR__.'/API/AuthRoute.php';

