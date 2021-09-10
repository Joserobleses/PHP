<?php

use App\Http\Controllers\EquipController;
use App\Http\Controllers\PartitController;
use App\Http\Controllers\UserController;
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

/*
PHPM12 Nivell 1 Exercici 2
Definir les rutes principals que tindrà el nostre lloc web.
El domini ha de tindre el CRUD al complet (Create, Read, Update, Delete)
 d'equips i partits utilitzant els mètodes HTTP corresponents.


*/
/*

     PHPM12 - Nivell 2 - Exercici 4   
     Defineix sistema de rols i bloqueja el accés a les diferents vistes segons 
     el seu nivell de privilegis.

     */

Route::get('/', function () {
    return view('home');
})->name('home');

require __DIR__.'/auth.php';

Route::group(['middleware'=>'auth'], function(){
    Route::resource('equip', EquipController::class);
    Route::resource('partit', PartitController::class);
});