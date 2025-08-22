<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//? redirect to login page on accessing the root URL
Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {
    Route::resource('/products', ProductController::class);
});

require __DIR__ . '/auth.php';