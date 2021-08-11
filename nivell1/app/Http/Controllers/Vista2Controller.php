<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vista2Controller extends Controller
{
    public function __invoke()
    {
        return view('vista2');
    }
}
