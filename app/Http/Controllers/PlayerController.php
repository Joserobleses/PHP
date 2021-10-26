<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Game;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Auth;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        global $playersEnviar;
        $playersEnviar = array();   
            
        
        $players = User::all();

       
       
        foreach($players as $player){
            
            
                $jugadesUnJugadorGuanyades = Game::where('resultat','guanya')->get(); 
                $jugadeUnJugador = Game::where('resultat','=','guanya')->where('player_id', $player->id)->count();     //2 y 3        
                foreach($jugadesUnJugadorGuanyades as $jugadaUnJugadorGuanyada){
                    
                if ($player->id == intval($jugadaUnJugadorGuanyada->player_id)){
                    
                    $jugadesUnJugadorTotals = Game::where('player_id', $player->id)->count(); 
                    

                    $player->toArray();
                    $player->media_exit = intval(($jugadeUnJugador/$jugadesUnJugadorTotals)*100);
                    $player->toJson();
                    }
            
                }
                
         
            array_push($playersEnviar, $player);  
        }
        

        return response()->json($playersEnviar);
      
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
        $validar = Validator::make($request->all(), [
        
            'name'=>'required|string|max:30',
            'email'=>'required|email|max:30',
            'password'=>'required|string|max:15'
        ]);

        if ($validar->fails()) {
            return response()->json(['error' => $validar->errors()], 401);
        }
          */  
        if (!isset($request->role)) $request->role = "anonimo";
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        
        $user->save();
    
       $credencials = $request->only('email','password');
       if (!$token = JWTAuth::attempt($credencials)) {
        return response()->json(['success' => false], 401);
    }
        return response()->json([
            'success' => true,
            'player' => $user,
            'token' =>$token

        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $player)
    {
       // dd($player);
        return response()->json($player);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $player)
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
        
        $actualitzarPlayer  = User::findOrFail($request->id);

        $input = $request->all();
    
        $actualitzarPlayer->fill($input)->save();



        return response()->json([
            'player' => $player
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $player)
    {
        // OJO UN SOLO PLAYER NO SE PUEDE
        $player->delete();
        return response()->json([
            'missatge' => 'Player eliminat'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function percentatgeMigExits()
    {
        global $playersEnviar;
        $playersEnviar = array();   
        $totalPuntuacio = 0;
        $players = User::all();

   
        foreach($players as $player){
        
        
            $jugadesUnJugadorGuanyades = Game::where('resultat','guanya')->get(); 
            $jugadeUnJugador = Game::where('resultat','=','guanya')->where('player_id', $player->id)->count();   
            foreach($jugadesUnJugadorGuanyades as $jugadaUnJugadorGuanyada){
                
            if ($player->id == intval($jugadaUnJugadorGuanyada->player_id)){
                
                $jugadesUnJugadorTotals = Game::where('player_id', $player->id)->count(); 
                // afegir nou atribut i el seu valor al objecte Player dinàmicament
                $player->toArray();
                $player->media_exit = intval(($jugadeUnJugador/$jugadesUnJugadorTotals)*100);
                $player->toJson();
                
                }
        
            }
            $totalPuntuacio += $player->media_exit;
            array_push($playersEnviar, $player);  
        }

        $numPlayers = count($players);
       
        $total = intval(($numPlayers/$totalPuntuacio)*100);

        if ($total==0) $total='0';
        return response()->json([
            'total' => $total
        ]);
        
    }

    public function winner()
    {
        global $playersEnviar;
        $playersEnviar = array();   
        $totalPuntuacio = 0;

        $players = User::all();
   
        foreach($players as $player){
        
        
            $jugadesUnJugadorGuanyades = Game::where('resultat','guanya')->get(); 
            $jugadeUnJugador = Game::where('resultat','=','guanya')->where('player_id', $player->id)->count();   
            
            foreach($jugadesUnJugadorGuanyades as $jugadaUnJugadorGuanyada){
                
            if ($player->id == intval($jugadaUnJugadorGuanyada->player_id)){
                
                $jugadesUnJugadorTotals = Game::where('player_id', $player->id)->count(); 
                // afegir nou atribut i el seu valor al objecte Player dinàmicament
                $player->toArray();
                if ($player->media_exit > $totalPuntuacio)  $totalPuntuacio = $player->media_exit;
                $player->media_exit = intval(($jugadeUnJugador/$jugadesUnJugadorTotals)*100);
                
                $player->toJson();
                
                }
        
            }
        
        array_push($playersEnviar, $player);  
        }

        $total = intval($totalPuntuacio);
        
        return response()->json([
            'total' => $total
        ]);
        
    }
    public function loser()
    {
        global $playersEnviar;
        $playersEnviar = array();   
        $totalPuntuacio = 5000;

        $players = User::all();
   
        foreach($players as $player){
        
        
            $jugadesUnJugadorGuanyades = Game::where('resultat','guanya')->get(); 
            $jugadeUnJugador = Game::where('resultat','=','guanya')->where('player_id', $player->id)->count();   
            foreach($jugadesUnJugadorGuanyades as $jugadaUnJugadorGuanyada){
                
            if ($player->id == intval($jugadaUnJugadorGuanyada->player_id)){
                
                $jugadesUnJugadorTotals = Game::where('player_id', $player->id)->count(); 
                // afegir nou atribut i el seu valor al objecte Player dinàmicament
                $player->toArray();
                
                
                $player->media_exit = intval(($jugadeUnJugador/$jugadesUnJugadorTotals)*100);
                  
                if ($player->media_exit < $totalPuntuacio ){
                        
                if ($player->media_exit !=0)  $totalPuntuacio = $player->media_exit;
                
            }
                $player->toJson();
                
                }
        
            }
        
        array_push($playersEnviar, $player);  
        }

        $total = intval($totalPuntuacio);
        
        return response()->json([
            'total' => $total
        ]);
    }

}
