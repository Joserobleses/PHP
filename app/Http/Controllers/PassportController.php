<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class PassportController extends Controller
{
    public function login(Request $request){
       
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|max:8',

        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (auth()->attempt($data)){
            $token = auth()->user()->createToken('Personal Access Token')->accessToken;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'No autoritzat'], 401);
        }
       
    }

    public function register(Request $request){
        
        $this->validate($request, [
            'nom'=>'required|string|max:30',
            'email'=>'required|email',
            'password'=>'required|string',

        ]);
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request){
        $token = Auth::user()->token();
        $token->revoke();
        return response()->json(['message' => 'Deslogat correctament']);
    }
}