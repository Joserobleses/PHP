<?php

namespace App\Http\Controllers;

use App\Models\Empleat;
use Illuminate\Http\Request;

class EmpleatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleats = Empleat::all();
        return view('empleat.index')->with(['empleats'=>$empleats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleat.create');
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
            'cognom'=>'required|string|max:30',
            'adreca'=>'required|string|max:100',
            'treballs'=>'required|string|max:25',
            'telefon'=>'required|string|max:9',
            'email'=>'required|email'

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
    
        $dadesEmpleat = request()->except('_token');

        Empleat::insert($dadesEmpleat);
        return redirect('empleat')->with('missatge', 'Empleat guardat correctament');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleat  $empleat
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $empleats = Empleat::all();
    
        return view('empleat.show')->with(['empleats'=>$empleats]);
    
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleat  $empleat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleat = Empleat::find($id);
    
        return view('empleat.edit', compact('empleat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleat  $empleat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validar = [
            'nom'=>'required|string|max:30',
            'cognom'=>'required|string|max:30',
            'adreca'=>'required|string|max:100',
            'treballs'=>'required|string|max:25',
            'telefon'=>'required|string|max:9',
            'email'=>'required|email'

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);

        $empleat = request()->except(['_token','_method']); 

        Empleat::where('id','=',$id)->update($empleat);
        
        // Cerca dades del empleat modificat a la BBDD
        $empleat = Empleat::find($id);

        return redirect('empleat')->with('missatge','Empleat modificat correctament');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleat  $empleat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleat $empleat)
    {
        $eliminar = Empleat::find($empleat->id);
        $eliminar->delete();

        return redirect('empleat')->with('missatge', 'Empleat esborrat correctament');
    }

    /**
     * Llista empleats en funció de la feina pasada com a paràmetre a través de la url.
     *
     * php_m11/public/empleat/treball/{parametre_treball}
     * 
     * @param  $feina
     * @return \Illuminate\Http\Response
     */
    public function buscaFeina($feina)
    {
        $empleats = Empleat::where('treballs', $feina)->get();
        return view('empleat.feina')->with(['empleats'=>$empleats]);
    }
}
