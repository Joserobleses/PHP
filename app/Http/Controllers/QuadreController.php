<?php

namespace App\Http\Controllers;

use App\Models\Quadre;
use Illuminate\Http\Request;

class QuadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quadres = Quadre::all();
        return response()->json($quadres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar = [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);

        $quadre = Quadre::create($request->all());
        return response()->json([
            'quadre' => $quadre
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quadre  $quadre
     * @return \Illuminate\Http\Response
     */
    public function show(Quadre $quadre)
    {
        return response()->json($quadre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quadre  $quadre
     * @return \Illuminate\Http\Response
     */
    public function edit(Quadre $quadre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quadre  $quadre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quadre $quadre)
    {
        $validar = [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
        
        $quadre->fill($request->post())->save();
        return response()->json([
            'quadre' => $quadre
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quadre  $quadre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quadre $quadre)
    {
        $quadre->delete();
        return response()->json([
            'missatge' => 'Quadre eliminat'
        ]);
    }
}

