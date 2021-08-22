<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GaletesController extends Controller
{
    public function guardarGaletes(Request $request){
        
        $galeta =   Cookie::make('email', $request->email);
        //echo $galeta;
        
        return response(view('formulari'))->withCookie($galeta);
    }
    
}
