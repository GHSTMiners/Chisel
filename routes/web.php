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
Route::get('/crypto/{id}/edit', [\App\Http\Controllers\CryptoController::class, 'edit'])->name('edit_crypto');
Route::get('/crypto', [App\Http\Controllers\CryptoController::class, 'index'])->name('crypto');
Route::get('/crypto/create', [App\Http\Controllers\CryptoController::class, 'create'])->name('create_crypto');
Route::delete('crypto/{id}', [\App\Http\Controllers\CryptoController::class, 'destroy'])->name('delete_crypto');
Route::post('/crypto', [\App\Http\Controllers\CryptoController::class, 'store']);
Route::patch('/crypto/{id}', [\App\Http\Controllers\CryptoController::class, 'update'])->name('update_crypto');

//Soil
Route::get('/soil', [\App\Http\Controllers\SoilController::class, 'index'])->name('soil');
Route::get('/soil/{id}/edit', [\App\Http\Controllers\SoilController::class, 'edit'])->name('soil_edit');
Route::get('/soil/create', [\App\Http\Controllers\SoilController::class, 'create'])->name('create_soil');
Route::post('/soil', [\App\Http\Controllers\SoilController::class, 'store']);
Route::delete('soil/{id}', [\App\Http\Controllers\SoilController::class, 'destroy'])->name('delete_soil');
Route::patch('/soil/{id}', [\App\Http\Controllers\SoilController::class, 'update'])->name('update_soil');

//Rocks
Route::get('/rock', [\App\Http\Controllers\RockController::class, 'index'])->name('rock');
Route::get('/rock/create', [\App\Http\Controllers\RockController::class, 'create'])->name('create_rock');
Route::post('/rock', [\App\Http\Controllers\RockController::class, 'store']);
Route::get('/rock/{id}/edit', [\App\Http\Controllers\RockController::class, 'edit'])->name('edit_rock');
Route::delete('rock/{id}', [\App\Http\Controllers\RockController::class, 'destroy'])->name('delete_rock');
Route::patch('/rock/{id}', [\App\Http\Controllers\RockController::class, 'update'])->name('update_rock');

//Puzzles
Route::get('/puzzle', [\App\Http\Controllers\PuzzleController::class, 'index'])->name('puzzle');
Route::get('/puzzle/create', [\App\Http\Controllers\PuzzleController::class, 'create'])->name('create_puzzle');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
