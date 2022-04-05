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

Route::get('/', [App\Http\Controllers\Backend\HomeController::class, 'index'])->name('administrator');
Route::post('/matter/soil/update-sorting', [App\Http\Controllers\Backend\SoilController::class, 'updateSorting'])->name('updateSortingSoil');


Auth::routes(['register' => true]);

//Crypto
Route::resources([
    'statistics/games' => \App\Http\Controllers\Backend\GameController::class,
    'statistics/categories' => \App\Http\Controllers\Backend\GameStatisticCategoryController::class,

    'global/logging' => \App\Http\Controllers\Backend\LogController::class,
    'global/api-keys' => \App\Http\Controllers\Backend\ApiKeyController::class,
    'global/wallet' => \App\Http\Controllers\Backend\WalletController::class,
    'matter/crypto' => \App\Http\Controllers\Backend\CryptoController::class,
    'matter/crypto-spawns' => \App\Http\Controllers\Backend\CryptoSpawnController::class,
    'matter/soil' => \App\Http\Controllers\Backend\SoilController::class,
    'matter/rock' => \App\Http\Controllers\Backend\RockController::class,
    'matter/rock-spawns' => \App\Http\Controllers\Backend\RockSpawnController::class,
    'matter/whitespace' => \App\Http\Controllers\Backend\WhiteSpaceController::class,
    'items/explosive' => \App\Http\Controllers\Backend\ExplosiveController::class,
    'items/consumable' => \App\Http\Controllers\Backend\ConsumableController::class,
    'gameplay/vital' => \App\Http\Controllers\Backend\VitalController::class,
    'gameplay/skill' => \App\Http\Controllers\Backend\SkillController::class,
    'gameplay/trait' => \App\Http\Controllers\Backend\AavegotchiTraitController::class,
    'world/puzzle' => \App\Http\Controllers\Backend\PuzzleController::class,
    'world/background' => \App\Http\Controllers\Backend\BackgroundController::class,
    'world/music' => \App\Http\Controllers\Backend\MusicController::class,
    'world/building' => \App\Http\Controllers\Backend\BuildingController::class,
    'world' => \App\Http\Controllers\Backend\WorldController::class
]);
