<?php

namespace App\Http\Controllers;

use App\Models\Equip;
use App\Models\User;
use Illuminate\Http\Request;

/*
PHPM12 - Nivell 1 - Exercici 2
Defineix els Models de dades, middleware i controllers que consideres necessaris.
 Recorda que al menys tindràs dues taules en base de dades; equips i partits. 
La interacció amb la base de dades es realitzarà per mitjà del ORM Eloquent i per tant els objectes seran persistits únicament en memòria.
*/
class EquipController extends Controller
{

    public function __construct(){
      // $this->authorizeResource(User::class,'user');
      //  echo ($this->authorizeResource(User::class,'user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equips = Equip::all();
        $usuarios = auth()->user();
        return view('equip.index')->with(['equips'=>$equips, 'usuarios'=>$usuarios]);
       // return view('equip.index')->with(['equips'=>$equips]);
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
        return view('equip.create')->with(['equips'=>$equips, 'usuarios'=>$usuarios]);
       // return view('equip.create')->with(['equips'=>$equips]);
        //return view('equip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /*
      PHPM12 - Nivell 1 -Exercici 3
      Heu de validar que la informació introduïda a l'usuari sigui correcta.
      */
    public function store(Request $request)
    {
        $validar = [
            'nom'=>'required|string|max:50',
            'camp'=>'required|string|max:50',
            'ciutat'=>'required|string|max:50',
        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);


        
        
        $dadesEquip = request()->except('_token');
        Equip::insert($dadesEquip);
        return redirect('equip');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function show(Equip $equip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equip = Equip::find($id);
        $usuarios = auth()->user();
        return view('equip.edit')->with(['equips'=>$equip, 'usuarios'=>$usuarios]);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        /*
      PHPM12 - Nivell 1 -Exercici 3
      Heu de validar que la informació introduïda a l'usuari sigui correcta.
      */
        $validar = [
            'nom'=>'required|string|max:50',
            'camp'=>'required|string|max:50',
            'ciutat'=>'required|string|max:50'
        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
     
        
        
        $equip = request()->except(['_token','_method']); 

        Equip::where('id','=',$id)->update($equip);
        
        // Cerca dades del equip modificat a la BBDD
        $equip = Equip::find($id);

        return redirect('equip');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equip  $equip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equip $equip)
    {
        $eliminar = Equip::find($equip->id);
        $eliminar->delete();

        return redirect('equip');
    }
}
