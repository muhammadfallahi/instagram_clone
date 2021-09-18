<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){

        return view('auth.login');
    }


    public function login(loginRequest $request){

        if (Auth::attempt($request->validated())) 
            return redirect()->route('user.index');

         return back()
         ->with('alert', 'incorrect username or password');
     
    }


    public function showRegister(){

        return view('auth.register');
    }

    public function register(RegisterRequest $request){


        User::create($request->validated());

        return redirect()->route('auth.showLogin')
               ->with('message', 'register successfully! please login for access the account');
    }

}
