<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index(){
        return 'Retorna paisos';
    }

    public function store(){
        return 'Desa paisos';
    }

    public function show($pais){
        return 'Retorna el pais : '.$pais;
    }

    public function update($pais){
        return 'Modificat el pais : '.$pais;
    }

    public function destroy($pais){
        return 'Eliminat el pais: '.$pais;
    }
}
