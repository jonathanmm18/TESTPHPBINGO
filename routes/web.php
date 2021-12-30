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

Route::get('/', function () {
    return view('welcome');
});

Route::get('player/getCard/{id}', 'App\Http\Controllers\BingoController\CardController@getCard')->name('getCard');
Route::get('player/create/{id}', 'App\Http\Controllers\BingoController\CardController@createPlayer')->name('createPlayer');
Route::get('player/all/', 'App\Http\Controllers\BingoController\CardController@getAllPlayers')->name('getAllPlayers');
Route::get('player/removeAll/', 'App\Http\Controllers\BingoController\CardController@removeAllPlayers')->name('removeAllPlayers');
Route::get('bingo/number', 'App\Http\Controllers\BingoController\CardController@callNumber')->name('callNumber');
