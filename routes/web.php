<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/list');
});
Route::resource('todo/',\App\Http\Controllers\todoController::class);
