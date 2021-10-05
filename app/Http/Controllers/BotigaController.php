<?php

namespace App\Http\Controllers;

use App\Models\Botiga;
use Illuminate\Http\Request;

class BotigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $botigues = Botiga::all();
        return response()->json($botigues);
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
        /*
        $validar = [
            'nomBotiga'=>'required|string|max:30',
            'capacitat'=>'required|string|max:3',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
*/
$input = $request->all();


        $validator = Validator::make($input, [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        $botiga = Botiga::create($request->all());
        return response()->json([
            'botiga' => $botiga
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Botiga  $botiga
     * @return \Illuminate\Http\Response
     */
    public function show(Botiga $botiga)
    {
        return response()->json($botiga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Botiga  $botiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Botiga $botiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Botiga  $botiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Botiga $botiga)
    {
        /*
        $validar = [
            'nomBotiga'=>'required|string|max:30',
            'capacitat'=>'required|string|max:3',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
*/

$input = $request->all();


        $validator = Validator::make($input, [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        

        $botiga->fill($request->post())->save();
        return response()->json([
            'botiga' => $botiga
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Botiga  $botiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Botiga $botiga)
    {
        $botiga->delete();
        return response()->json([
            'missatge' => 'Botiga eliminada'
        ]);
    }
}
