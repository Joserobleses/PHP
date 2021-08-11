<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vista1Controller;
use App\Http\Controllers\Vista2Controller;
use App\Http\Controllers\Vista3Controller;

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

Route::get('vista1', Vista1Controller::class);
Route::get('vista2', Vista2Controller::class);
Route::get('vista3/{nom?}', Vista3Controller::class);
