<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vista1Controller extends Controller
{
    public function __invoke()
    {
        return view('vista1');
    }
}
