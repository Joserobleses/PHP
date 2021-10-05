<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\QuadreController;
use  App\Http\Controllers\BotigaController;


use App\Http\Controllers\Passport;
use App\Http\Controllers\PassportController;


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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[PassportController::class,'register']);

Route::post('login',[PassportController::class,'login'])->name('login');

Route::group(['middleware' => ['cors']], function () {
Route::middleware('auth:api')->group(function(){
   
    Route::resource('quadre', App\Http\Controllers\QuadreController::class)->only(['index','store','update','show','destroy']);

    Route::resource('botiga', App\Http\Controllers\BotigaController::class)->only(['index','store','update','show','destroy']);

   // Route::delete('incendiar', [App\Http\Controllers\BotigaController::class,'incendiar']);
   Route::delete('/botigas/quadre/quadres', [App\Http\Controllers\QuadreController::class,'incendiar']);

    Route::post('logout',[PassportController::class,'logout']);
});
});