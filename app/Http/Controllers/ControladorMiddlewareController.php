<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorMiddlewareController extends Controller
{
    /* EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
    */
    public function index()
    {
        return view('controlador');
    }
    /* FI EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
    */
}
