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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes(['register' => true]);

//Crypto
Route::resources([
    'crypto' => \App\Http\Controllers\CryptoController::class,
    'soil' => \App\Http\Controllers\SoilController::class,
    'rock' => \App\Http\Controllers\RockController::class,
    'explosive' => \App\Http\Controllers\ExplosiveController::class,
    'item' => \App\Http\Controllers\ItemController::class,
    'puzzle' => \App\Http\Controllers\PuzzleController::class
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
