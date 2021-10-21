<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('/client')->name('client.')->group(function () {

    Route::get('/', [App\Http\Controllers\Client\IndexController::class, 'index'])->name('index');

});

Route::middleware('auth')->prefix('/manager')->name('manager.')->group(function () {

    Route::get('/', [App\Http\Controllers\Manager\IndexController::class, 'index'])->name('index');

});

Route::middleware('auth')->prefix('/dashboard')->name('dashboard.')->group(function () {

    Route::get('/', [App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('index');
    Route::resource('/page', App\Http\Controllers\Dashboard\PageController::class);

});