<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller as Controller;

class PassportController extends Controller
{
   
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
   /**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
public function index(Request $request)
{
    $headers = $request->header('connection');

//    dd($headers);
}

   
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }


    public function login(Request $request){
       
       /*
$input = $request->all();


        $validator = Validator::make($input, [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }



       */
       
        /*
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|max:8',

        ]);
*/
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
        //return response()->json(['token' => 'paso :)'], 200);
        /*
        $this->validate($request, [
            'nom'=>'required|string|max:30',
            'email'=>'required|email',
            'password'=>'required|string',

        ]);
        */
        /*
        $input = $request->all();


        $validator = Validator::make($input, [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
*/

/*
$input = $request->all();


        $validator = Validator::make($input, [
            'nomAutor'=>'required|string|max:30',
            'preu'=>'required|string|max:9',
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        */

        $user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('Personal Access Token')->accessToken;

        return response()->json(['token' => $token], 200);
    }
/*
    public function logout(Request $request){
        $token = Auth::user()->token();
        $token->revoke();
        return response()->json(['message' => 'Deslogat correctament']);
    }
    */
}
