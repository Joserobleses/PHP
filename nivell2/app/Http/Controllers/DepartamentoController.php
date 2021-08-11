<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index($pais){
        return 'Retorna departaments del pais: '.$pais;
    }

    public function store($pais){
        return 'Envia departaments del pais: '.$pais;
    }

    public function show($pais, $departamento){
        return 'Retorna el departament: '.$departamento.', del pais: '.$pais;
    }

    public function update($pais, $departamento){
        return 'Ha estat modificat el departament: '.$departamento.', del pais: '.$pais;
    }

    public function destroy($pais, $departamento){
        return 'Departament  eliminat : '.$departamento.', pertanyia al pais: '.$pais;
    }
}
