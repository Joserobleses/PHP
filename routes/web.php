<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleatController;
use App\Http\Controllers\CercadorController;


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
    return view('auth.login');
});


Route::get('empleat/treball',[EmpleatController::class,'show'])->name('show')->middleware('auth');

/*
Tasca M11 - Nivell 2

- Exercici 4

Crea una petició HTTP especial que busqui empleats per feina.

*/

Route::get('empleat/treball/{feina}',[EmpleatController::class,'buscaFeina'])->name('buscafeina')->middleware('auth');


/*
Tasca M11 - Nivell 2

- Fi Exercici 4

Crea una petició HTTP especial que busqui empleats per feina.

*/

/*
Tasca M11 - Nivell 1

- Exercici 1

Crear una aplicació, per la gestió d'empleats, aplicant el patró de disseny de software MVC(Model-Vista-Controlador). 

Definir les rutes principals que tindrà el nostre lloc web. 
El domini ha de tindre el CRUD al complet (Create, Read, Update, Delete), utilitzant els verbs HTTP associats.

*/

Route::resource('empleat', EmpleatController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [EmpleatController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [EmpleatController::class, 'index'])->name('home');

});

/*
Tasca M11 - Nivell 1

-Fi  Exercici 1

Crear una aplicació, per la gestió d'empleats, aplicant el patró de disseny de software MVC(Model-Vista-Controlador). 

Definir les rutes principals que tindrà el nostre lloc web. 
El domini ha de tindre el CRUD al complet (Create, Read, Update, Delete), utilitzant els verbs HTTP associats.

*/