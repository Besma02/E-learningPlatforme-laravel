<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function doLogin(Request $request)
    {
       $credentials=$request->validate([
        'email'=>['required','email'],
        'password'=>'required'
       ]) ;
          if(Auth::guard('admin')->attempt(['email'=>$request->get('email'),'password'=>$request->get('password')])){
          $request->session()->regenerate();
            
            return redirect('/dashboard')->with('mssg','login successufly');
        }else{
           return back()->withErrors(['email'=>'credentials are incorrect'])->onlyInput('email');
        }
    }
    public function logout(Request $request)
    {  
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        return redirect('/dashboard/login');

    }
}
