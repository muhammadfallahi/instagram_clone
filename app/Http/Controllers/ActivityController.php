<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
       $user =  User::find(auth()->user()->id);
       $posts = $user->posts;
        return view('activities.index',compact('posts'));
    }
}
