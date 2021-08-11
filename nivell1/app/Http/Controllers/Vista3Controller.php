<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Vista3Controller extends Controller
{
    public function __invoke($nom ='')
    {
        return view('vista3', compact(['nom']));
    }
}
