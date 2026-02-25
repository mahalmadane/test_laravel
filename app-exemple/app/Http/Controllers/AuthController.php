<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function showlogin(){
        return view('auth.login');
    }

        function showregister(){
        return view('auth.register');
    }

    function login(Request $request){
        $validated=$request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('products.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    
    function register(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'name' => 'required'
        ]);
       
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) #hacher le mot de passe
        ]);
        
        return redirect()->route('products.index');

}
}
