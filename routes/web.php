<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::name('site.')->group(function () {

    Route::get('/', [App\Http\Controllers\Site\IndexController::class, 'index'])->name('index');

});

require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
