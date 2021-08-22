<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataActualRuta
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    /* EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
    */
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        echo "<h1 style='color: red;'>Middleware a nivel controlador ".$date."</h1>";
        return $next($request);
    /* FI EXERCICI 4
    Creeu un middleeare a nivell de controlador. 
    Aquest midlware serà l'encarregat d'imprimir la data actual a la pantalla abans de carregar la informació.
    */
    }
}
