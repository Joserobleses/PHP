<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\Auth;

use App\Models\User;



class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','registre']]);
    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        
        $credencials = $request->only('email','password');
       
       
        if (!$token = JWTAuth::attempt($credencials)) {
            return response()->json(['success' => false], 401);
        }
        $player_id = Auth::id(); 

        return response()->json(['success' => true,'token' =>$token, 'player_id' =>$player_id], 200); 
        
        
    }

    public function checkToken(){
        return response()->json(['success' =>true], 200);
    }


    
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Deslogat correctament']);
       
    }

   
}