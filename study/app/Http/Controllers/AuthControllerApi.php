<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthControllerApi extends Controller
{
   
    public function doLogin(Request $request)
    {
       $credentials=$request->validate([
        'email'=>['required','email'],
        'password'=>'required'
       ]) ;
          if(Auth::attempt(['email'=>$request->get('email'),'password'=>$request->get('password')])){
          $user=Auth::user();
          $token = $request->user()->createToken('API Token');
          return ['token' => $token->plainTextToken];
          
         return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => "Credentials incorrect"], 400);

        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:60',
            'email' => 'required|email',
            'password' => 'required|min:8',
            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->toArray()], 400);
        }
        $user= User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            
        ]);

        $token = $user->createToken('API Token')->plainTextToken;
        return response()->json(['token' => $token]);
    }
    public function logout(Request $request)
    {  
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'logout success']);

    }
}
