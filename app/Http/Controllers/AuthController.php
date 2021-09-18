<?php

namespace App\Http\Controllers;

use App\Http\Requests\Register as RequestsRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin(){

        return view('auth.login');
    }


    public function showRegister(){

        return view('auth.register');
    }

    public function register(RequestsRegister $request){


        User::create($request->validated());

        return redirect()->route('auth.showLogin')
               ->with('message', 'register successfully! please login for access the account');
    }

}
