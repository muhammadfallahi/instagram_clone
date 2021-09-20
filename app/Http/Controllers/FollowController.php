<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(Request $request){
        Auth::user()->sync()
        return $request->following;
    }
}
