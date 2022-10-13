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
Route::apiResource('logging', \App\Http\Controllers\API\LogController::class, array("as" => "api"));
Route::apiResource('world', \App\Http\Controllers\API\WorldController::class, array("as" => "api"));
Route::get('statistics/categories', '\App\Http\Controllers\API\StatisticsController@categories', array("as" => "api"));
Route::post('statistics/gotchi/{category_id}', '\App\Http\Controllers\API\StatisticsController@gotchi', array("as" => "api"));
Route::get('statistics/highscores/{category_id}', '\App\Http\Controllers\API\StatisticsController@highscores', array("as" => "api"));
Route::get('statistics/games', '\App\Http\Controllers\API\ServerStatsController@games', array("as" => "api"));

Route::post('game/create', '\App\Http\Controllers\API\GameController@create', array("as" => "api"));
Route::post('game/add_statistics', '\App\Http\Controllers\API\GameController@add_statistics', array("as" => "api"));

Route::post('wallet/challenge', '\App\Http\Controllers\API\WalletChallengeController@challenge', array("as" => "api"));
Route::post('wallet/validate', '\App\Http\Controllers\API\WalletChallengeController@validate_challenge', array("as" => "api"));
Route::post('token/validate', '\App\Http\Controllers\API\WalletAuthTokenController@validate_token', array("as" => "api"));
Route::get('wallet/auth', '\App\Http\Controllers\API\WalletChallengeController@authenticate', array("as" => "api"));
Route::get('wallet/sign-out', '\App\Http\Controllers\API\WalletChallengeController@sign_out', array("as" => "api"))->name("wallet_sign_out");
Route::get('servers/all', '\App\Http\Controllers\API\ServerRegionController@regions', array("as" => "api"));
Route::get('servers/{region_id}', '\App\Http\Controllers\API\ServerRegionController@region_by_id', array("as" => "api"));

