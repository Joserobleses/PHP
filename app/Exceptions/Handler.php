<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
        /* EXERCICI 5
            Crea un sistema que gestiona l'error 404 a nivell de projecte. 
            Podeu utilitzar la funció Resposta i la redirecció de Laravel.
        */


        $this->renderable(function (Throwable $e) {
            return response()->view('error404', [], 404);
        });
        
    }
    /* FI EXERCICI 5
        Crea un sistema que gestiona l'error 404 a nivell de projecte. 
        Podeu utilitzar la funció Resposta i la redirecció de Laravel.
    */
    
}
