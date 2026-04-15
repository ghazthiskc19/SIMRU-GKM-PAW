<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/app_pages.php';
require __DIR__ . '/bem.php';
