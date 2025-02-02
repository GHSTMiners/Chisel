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

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');
Route::get('/leaderboard', [App\Http\Controllers\Frontend\LeaderBoardController::class, 'index'])->name('leaderboard');
Route::get('/about', [App\Http\Controllers\Frontend\AboutController::class, 'index'])->name('about');

//Crypto
//Crypto
Route::resources([
    'my-account' => \App\Http\Controllers\Frontend\AccountController::class,
]);

