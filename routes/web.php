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


Auth::routes(['register' => false]);

//Crypto
Route::get('/crypto/{id}/edit', [\App\Http\Controllers\CryptoController::class, 'edit'])->name('crypto_edit');
Route::get('/crypto', [App\Http\Controllers\CryptoController::class, 'index'])->name('crypto');
Route::get('/crypto/create', [App\Http\Controllers\CryptoController::class, 'create'])->name('create_crypto');
Route::delete('crypto/{id}', [\App\Http\Controllers\CryptoController::class, 'destroy'])->name('delete_crypto');
Route::post('/crypto', [\App\Http\Controllers\CryptoController::class, 'store']);

//Soil
Route::get('/soil/{id}/edit', [\App\Http\Controllers\CryptoController::class, 'edit'])->name('soil_edit');

Route::get('/soil', [\App\Http\Controllers\SoilController::class, 'index'])->name('soil');
Route::get('/soil/create', [\App\Http\Controllers\SoilController::class, 'create'])->name('create_soil');
Route::post('/soil', [\App\Http\Controllers\SoilController::class, 'store']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
