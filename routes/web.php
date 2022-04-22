<?php

use App\Http\Controllers\ProspectController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('/prospects', ProspectController::class);
    Route::resource('/tags', TagController::class);
});


require __DIR__ . '/auth.php';
