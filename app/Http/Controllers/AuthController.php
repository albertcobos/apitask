<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use stdCalass;

class AuthController extends Controller
{

    //Register users
    public function register(Request $request){

            ///We validate the fields we will need
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed'
            ]);

                //we register the user
               $user = new User();
               $user->name = $request ->name;
               $user->email = $request ->email;
               $user->password = Hash::make($request -> password);//we encrypt the password
               $user->save();

               $token = $user->createToken('auth_token')->plainTextToken;//we create the user token
               return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer',]);
    }

    public function login (Request $request){

        //we receive the data
          $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
          ]);

          //if the data is correct, we create the token
          if(Auth::attempt($credentials)){
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;///we create the user token
            return $token;
            //return response()->json(['data' => $user,'access_token' => $token, 'token_type' => 'Bearer',]);
        }

        //if the data is incorrect we show error
        else{
            return response(["message" =>"credentiales Invalidas"],Response::HTTP_UNAUTHORIZED);
        };
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response(["message"=>"cierre de sesion ok"], Response::HTTP_OK);
    }
}
