<?php


namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request){
    

        $vaildateData = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','string','min:3'],
        ]);

        $users =  User::create($vaildateData);
        $token = $users->createToken("auth_token")->accessToken;

      
        return  response()->json(
            [
                "users" =>  $users,
                "token" =>  $token,
                "messege" =>  'user created',
                "status" =>  1

            ]
               

        );



    }
	
	
	public function login(Request $request){
    

       
	 print_r($request);



    }
	
	
}
