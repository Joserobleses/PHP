<?php

namespace App\Http\Controllers;

use App\Models\ReservaHotel;
use Illuminate\Http\Request;

class ReservaHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = ReservaHotel::all();
        $usuarios = auth()->user();
        //return view('reservas.index')->with(['reservas' => $reservas]);
        return view('layouts.reservas')->with(['reservas' => $reservas, 'usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = auth()->user();
        return view('layouts.create')->with(['usuarios'=>$usuarios]);
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
            'nom'=>'required|string|max:30',
            'cognoms'=>'required|string|max:30',
            'passaport'=>'required|string|max:50',
            'telefon'=>'required|string|max:9',
            'email'=>'required|email',
            'adreca'=>'required|string|max:100',
            'ciutat'=>'required|string|max:50',
            'provincia'=>'required|string|max:50',
            'pais'=>'required|string|max:50',
            'comentaris'=>'required|string|max:200',

        ];
        $missatge = [
            'required'=>'El camp es obligatori',
            'email'=>'El email es incorrecte'
        ];

        $this->validate($request, $validar,$missatge);


        $reservas = request()->except('_token');
        ReservaHotel::insert($reservas);
        return redirect('reservas')->with('missatge', 'Reserva guardada correctament');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReservaHotel  $reservaHotel
     * @return \Illuminate\Http\Response
     */
    public function show(ReservaHotel $reservaHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = ReservaHotel::find($id);
        $usuarios = auth()->user();
       // return view('reservas.edit', compact('reserva'));
       return view('layouts.edit', compact('reserva','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReservaHotel  $reservaHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $validar = [
            'nom'=>'required|string|max:30',
            'cognoms'=>'required|string|max:30',
            'passaport'=>'required|string|max:50',
            'telefon'=>'required|string|max:9',
            'email'=>'required|email',
            'adreca'=>'required|string|max:100',
            'ciutat'=>'required|string|max:50',
            'provincia'=>'required|string|max:50',
            'pais'=>'required|string|max:50',
            'comentaris'=>'required|string|max:200',

        ];
        $missatge = [
            'required'=>'El camp es obligatori',
            'email'=>'El email es incorrecte'
        ];

        $this->validate($request, $validar,$missatge);

        $reserva = request()->except(['_token','_method']); 

        ReservaHotel::where('id','=',$id)->update($reserva);
        
        // Cerca dades de la reserva modificat a la BBDD
  //      $reserva = ReservaHotel::find($id);

        return redirect('reservas')->with('missatge','Reserva modificada correctament');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReservaHotel::destroy($id);

        return redirect('reservas');
    }
}
