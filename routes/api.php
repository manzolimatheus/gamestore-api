<?php

use App\Http\Controllers\GamesController;
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

Route::get('/games', [GamesController::class, 'GetGames']);
Route::post('/newgame', [GamesController::class, 'CreateGame']);
Route::put('game/{id}', [GamesController::class, 'EditGame']);
Route::delete('game/{id}', [GamesController::class, 'DeleteGame']);
Route::get('game/{id}', [GamesController::class, 'GetGame']);
Route::get('games/{name}', [GamesController::class, 'SearchGame']);
