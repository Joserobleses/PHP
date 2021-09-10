<?php
/*

PHPM12 - Nivell 1 - Exercici 2
Defineix els Models de dades, middleware i controllers que consideres necessaris.
 Recorda que al menys tindràs dues taules en base de dades; equips i partits. 
La interacció amb la base de dades es realitzarà per mitjà del ORM Eloquent i per tant els objectes seran persistits únicament en memòria.
*/
namespace App\Http\Controllers;

use App\Models\Equip;
use App\Models\Partit;
use Illuminate\Http\Request;

class PartitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partits = Partit::all();
        $equips = Equip::all();
        $usuarios = auth()->user();
        return view('partit.index')->with(['partits'=>$partits, 'equips'=>$equips, 'usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equips = Equip::all();
        $usuarios = auth()->user();
        return view('partit.create')->with(['equips'=>$equips, 'usuarios'=>$usuarios]);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*
      PHPM12 - Nivell 1 -Exercici 3
      Heu de validar que la informació introduïda a l'usuari sigui correcta.
      */
        $validar = [
            'data_partit'=>'required|date',
            'id_equip_1'=>'required|string|max:50|different:id_equip2',
            'marcador_equip_1'=>'required|string|max:2',
            'id_equip2'=>'required|string|max:50|different:id_equip_1',
            'marcador_equip2'=>'required|string|max:2'
        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);


        $dadesPartit = request()->except('_token');
        Partit::insert($dadesPartit);
        
        return redirect('partit');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partit  $partit
     * @return \Illuminate\Http\Response
     */
    public function show(Partit $partit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partit  $partit
     * @return \Illuminate\Http\Response
     */
    //public function edit(Partit $partit)
    public function edit($id)
    {
        $partit = Partit::find($id);
        $equips = Equip::all();
        $usuarios = auth()->user();
        return view('partit.edit')->with(['partit'=>$partit, 'equips'=>$equips, 'usuarios'=>$usuarios]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partit  $partit
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, $id)
    {
    
         /*
      PHPM12 - Nivell 1 -Exercici 3
      Heu de validar que la informació introduïda a l'usuari sigui correcta.
      */
        $validar = [
            'data_partit'=>'required|date',
            'id_equip_1'=>'required|string|max:50|different:id_equip2',
            'marcador_equip_1'=>'required|string|max:2',
            'id_equip2'=>'required|string|max:50|different:id_equip_1',
            'marcador_equip2'=>'required|string|max:2'
        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
     
     
     
        $partit = request()->except(['_token','_method']); 

        Partit::where('id','=',$id)->update($partit);
        
        // Cerca dades del partit modificat a la BBDD
        $partit = Partit::find($id);

        return redirect('partit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partit  $partit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partit $partit)
    {
        $eliminar = Partit::find($partit->id);
        $eliminar->delete();

        return redirect('partit');
    }
}
