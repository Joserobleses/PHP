<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function create(Request $request) {
        /* Exercici 3
                     Crear els formularis necessaris per a poder realitzar un CRUD
                     sobre el sistema de gestió de la biblioteca tècnica.
                     Heu de validar que la informació introduïda a l'usuari sigui correcta.
 
         */
         $request->validate([
             'name' => 'required'
         ]);
         
         return view('catalog.create');
     }
 
     public function edit(Request $request) {
         /* Exercici 3
                     Crear els formularis necessaris per a poder realitzar un CRUD
                     sobre el sistema de gestió de la biblioteca tècnica.
                     Heu de validar que la informació introduïda a l'usuari sigui correcta.
 
         */
         $request->validate([
             'name' => 'required'
         ]);
         return view('catalog.edit');
     }
}
