<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ControladorMiddlewareController;
use App\Http\Controllers\GaletesController;

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

//** EXERCICI 1 */
//* creació de llistat de rutes, un cop provades algunes cambien al verb
//* adequat per la seva operativa. 
//* Codi comentat per continuar amb el seguent exercici

/*
Route::get('/', function () {
    return 'Pantalla principal';//return view('welcome');
});
*/
/* Ruta substituida pel verb post
Route::get('login', function () {
    return 'Login usuari';
});
*/
/*
Route::post('login', function () {
    
});

Route::get('logout', function () {
    return 'Logout usuari';
});

Route::get('catalog', function () {
    return 'Llista llibres';
});

Route::get('catalog/show/{id}', function ($id) {
    return 'Vista detall libre '.$id;
});
*/
/* Ruta substituida pel verb put
Route::get('catalog/create', function () {
    return 'Afegir llibre';
});
*/
/*
Route::put('catalog/create', function () {
    
});
*/
/* Ruta substituida pel verb put
Route::get('catalog/edit/{id}', function ($id) {
    return 'Modificar llibre '.$id;
});
*/
/*
Route::put('catalog/edit/{id}', function () {
    
});
*/
//* FI EXERCICI 1 */

//** EXERCICI 2 i 3 */
//* creació de llistat de rutes, un cop provades algunes cambien al verb
//* adequat per la seva operativa. 
//* Codi anterior comentat per continuar amb el seguent exercici
//* Comentada linia    \App\Http\Middleware\VerifyCsrfToken::class, d'arxiu app/Http/Kernel.php 
//* per fer servir POST al login
//* 
//* Exportació postman a la ruta php_m10\exercicis\Nivell1


Route::get('/', function () {
    return view('home');
});

Route::get('login', function () {
    //Comentada linia    \App\Http\Middleware\VerifyCsrfToken::class, d'arxiu app/Http/Kernel.php
    return view('auth.login');
});

Route::post('login', function () {
    return view('auth.login');
});

Route::get('catalog', function () {
    return view('catalog.index');
});

Route::get('catalog/show/{id}', function ($id) {
    return view('catalog.show')->with(['id'=>$id]);
});


/* Substituit per la ruta seguent a l'exercici 3
Crear els formularis necessaris per a poder realitzar un CRUD sobre el sistema de gestió de la biblioteca tècnica.
Heu de validar que la informació introduïda a l'usuari sigui correcta.

Route::get('catalog/create', function () {
    return view('catalog.create')->name('catalog.create');
});

*/

Route::get('catalog/create', function () {
    return view('catalog.create');
});

Route::post('catalog/create', [CatalogController::class, 'create'])->name('catalog.create');

Route::get('catalog/edit/{id?}',function ($id) {
    return view('catalog.edit')->with(['id'=>$id]);
});
/* substituit per la seguent ruta per mostrar formulari pels CRUD exercici 3
Route::post('catalog/edit/{id}',function ($id) {
    return view('catalog.edit')->with(['id'=>$id]);
});
*/
Route::post('catalog/edit/{id?}', [CatalogController::class, 'edit'])->name('catalog.edit');

//* FI EXERCICI 2 i 3*/

/* EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
*/

Route::get('controlador', [ControladorMiddlewareController::class,'index'])->middleware('dataactualruta');

/* FI EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
*/

// Exercici 5 resolt a app/exceptions/Handler.php

/* EXERCICI 6
   Afegeix la vista d'inici de sessió, registre i recuperació de contrasenya que l'usuari necessita per accedir a l'aplicació.

Nota: No cal crear la lògica per treballar amb la BD.
*/
Route::get('formulari', function(){
    return view ('formulari');
});

/* FI EXERCICI 6
   Afegeix la vista d'inici de sessió, registre i recuperació de contrasenya que l'usuari necessita per accedir a l'aplicació.

Nota: No cal crear la lògica per treballar amb la BD.
*/


/* EXERCICI 7
    Agafeu les dades d'inici de sessió al sistema de galetes de Laravel.
    En cadascuna de les vistes has d'incrustar un navbar en el qual apareix el nom d'usuari registrat.
*/
Route::post('formulari', [GaletesController::class, 'guardarGaletes'])->name('formulari');

/* FI EXERCICI 7
    Agafeu les dades d'inici de sessió al sistema de galetes de Laravel.
    En cadascuna de les vistes has d'incrustar un navbar en el qual apareix el nom d'usuari registrat.
*/