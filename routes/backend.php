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


Auth::routes(['register' => true]);

//Crypto
Route::resources([
    'matter/crypto' => \App\Http\Controllers\Backend\CryptoController::class,
    'matter/soil' => \App\Http\Controllers\Backend\SoilController::class,
    'matter/rock' => \App\Http\Controllers\Backend\RockController::class,
    'items/explosive' => \App\Http\Controllers\Backend\ExplosiveController::class,
    'items/consumable' => \App\Http\Controllers\Backend\ConsumableController::class,
    'items/consumable/consumableVitalEffect' => \App\Http\Controllers\Backend\ConsumableVitalEffectController::class,
    'items/consumable/consumableSkillEffect' => \App\Http\Controllers\Backend\ConsumableSkillEffectController::class,
    'gameplay/vital' => \App\Http\Controllers\Backend\VitalController::class,
    'gameplay/skill' => \App\Http\Controllers\Backend\SkillController::class,
    'gameplay/trait' => \App\Http\Controllers\Backend\AavegotchiTraitController::class,
    'gameplay/traitEffect' => \App\Http\Controllers\Backend\TraitEffectController::class,
    'world/puzzle' => \App\Http\Controllers\Backend\PuzzleController::class,
    'world' => \App\Http\Controllers\Backend\WorldController::class
]);
