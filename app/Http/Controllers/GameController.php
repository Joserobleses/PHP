<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Game;
use App\Models\Player;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all();

        return response()->json($games);
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
    {/*
        $validar = [
            //'nomB'=>'required|string|max:30',
            //'capacitat'=>'required|string|max:3',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
*/

        $game = new Game;

        $game->dau1 = $request->dau1;
        $game->dau2 = $request->dau2;
        $game->resultat = $request->resultat;
        

        $game->player_id = $request->id; 

        $game->save();

   

        return response()->json([
            'game' => $game
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        return response()->json($game);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        /*
        $validar = [
            //'nomBotiga'=>'required|string|max:30',
           // 'capacitat'=>'required|string|max:3',

        ];
        $missatge = [
            'required'=>'El camp es obligatori'
        ];

        $this->validate($request, $validar,$missatge);
*/

        $game->fill($request->post())->save();
        
        return response()->json([
            'game' => $game
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         // OJO UN SOLO PLAYER NO SE PUEDE
         
         
       $games = Game::where('player_id',$request->id)->delete();
       
        return response()->json([
            'missatge' => 'Games eliminats'
        ]);
    }


    ////////////////////////


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function llistarGamesPlayer(Request $request)
    {
       
        if (!empty($request->id)){
            $games = Game::where('player_id',$request->id)->get();
            return response()->json($games);
        }else{
            return response()->json([
                'missatge' => 'No hi ha games a mostrar per aquest Player'
            ],400);
        }  
    }

}
