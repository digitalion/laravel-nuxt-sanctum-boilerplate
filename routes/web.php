<?php

use Illuminate\Support\Facades\Route;

Route::get(
    '{uri}',
    '\\' . Digitalion\LaravelNuxt\Controllers\NuxtController::class
)->where('uri', '.*');
