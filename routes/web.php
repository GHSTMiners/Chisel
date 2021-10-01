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
    'matter/crypto' => \App\Http\Controllers\CryptoController::class,
    'matter/soil' => \App\Http\Controllers\SoilController::class,
    'matter/rock' => \App\Http\Controllers\RockController::class,
    'items/explosive' => \App\Http\Controllers\ExplosiveController::class,
    'items/item' => \App\Http\Controllers\ItemController::class,
    'gameplay/vital' => \App\Http\Controllers\VitalController::class,
    
    'puzzle' => \App\Http\Controllers\PuzzleController::class
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
