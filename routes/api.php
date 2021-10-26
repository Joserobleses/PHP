<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use  App\Http\Controllers\PlayerController;
use  App\Http\Controllers\GameController;
use App\Http\Controllers\AuthController;

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


    Route::post('login',[AuthController::class, 'login'])->name('auth.login');
    Route::post('checkToken',[AuthController::class, 'checkToken'])->name('auth.checkToken');
    // POST: /players : crea un jugador
    Route::post('players', [App\Http\Controllers\PlayerController::class,'store'])->name('players.store');

// Agrupamos rutas para solucionar cors mediante middleware cors
Route::group(['middleware' => ['cors']], function () {
Route::group(['middleware' => ['jwt.verify']], function () {
    
    Route::post('logout',[AuthController::class, 'logout'])->name('auth.logout');
    //Route::resource('player', App\Http\Controllers\PlayerController::class)->only(['index','store','update','show','destroy']);
    Route::resource('player', App\Http\Controllers\PlayerController::class)->only(['show','destroy']);

    //Route::resource('game', App\Http\Controllers\GameController::class)->only(['index','store','update','show','destroy']);
    Route::get('games', [App\Http\Controllers\GameController::class, 'index']);

    // POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
    Route::post('/players/{id}/games/', [App\Http\Controllers\GameController::class,'store'])->name('games.store');

    // GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits. 
    Route::get('/players/ranking/', [App\Http\Controllers\PlayerController::class,'percentatgeMigExits'])->name('players.percentatgeMigExits');

    // GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
    Route::get('/players/ranking/loser/', [App\Http\Controllers\PlayerController::class,'loser'])->name('players.loser');

    // GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.
    Route::get('/players/ranking/winner/', [App\Http\Controllers\PlayerController::class,'winner'])->name('players.winner');

  
   Route::get('/players/{id}', [App\Http\Controllers\PlayerController::class,'show'])->name('players.show');
   
   // PUT /players/{id} : modifica el nom del jugador
   Route::put('/players/{id}', [App\Http\Controllers\PlayerController::class,'update'])->name('players.update');

   // DELETE /players/{id}/games: elimina les tirades del jugador
   Route::delete('/players/{id}/games', [App\Http\Controllers\GameController::class,'destroy'])->name('games.destroy');
   
   // GET /players/{id}/games: retorna el llistat de jugades per un jugador.
   Route::get('/players/{id}/games', [App\Http\Controllers\GameController::class,'llistarGamesPlayer'])->name('games.llistarGamesPlayer');

   
   
   // GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
   Route::get('players/', [App\Http\Controllers\PlayerController::class,'index'])->name('players.index');
   
});
});

/*

>>>>>POST: /players : crea un jugador
>>>>>PUT /players/{id} : modifica el nom del jugador
POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
>>>>>DELETE /players/{id}/games: elimina les tirades del jugador
>>>>>GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
>>>>>GET /players/{id}/games: retorna el llistat de jugades per un jugador.
>>GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
>>GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
>>GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.

*/
