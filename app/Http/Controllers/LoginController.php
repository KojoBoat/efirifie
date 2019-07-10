<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    // Login user here
    public function login_user(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {
           // Authentication passed...
           // return redirect('/joinus');
           return redirect()->intended('/');
       }
         else {
             
             return redirect("/login");
         }
       
   }

   public function logout() {
    Auth::logout();
    return redirect("home");
   }
}
