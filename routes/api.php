<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('world', \App\Http\Controllers\API\WorldController::class, array("as" => "api"));
Route::apiResource('crypto', \App\Http\Controllers\API\CryptoController::class, array("as" => "api"));
Route::post('wallet/challenge', '\App\Http\Controllers\API\WalletChallengeController@challenge', array("as" => "api"));
Route::post('wallet/validate', '\App\Http\Controllers\API\WalletChallengeController@validate_challenge', array("as" => "api"));
Route::post('wallet/auth', '\App\Http\Controllers\API\WalletChallengeController@authenticate', array("as" => "api"));

