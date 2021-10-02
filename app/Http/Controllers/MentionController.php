<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MentionController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->mentions;    //used for show user mention message in profile
        return back()
        ->with('act2', 'active')
        ->with('posts', $posts);
    }
}
