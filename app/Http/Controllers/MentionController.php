<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentionController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->mentions()->paginate(3);    //used for show user mention message in profile
        // dd($posts);
        return back()
        ->with('act2', 'active')
        ->with('posts', $posts);
    }
}
