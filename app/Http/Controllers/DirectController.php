<?php

namespace App\Http\Controllers;

use App\Models\Direct;
use Illuminate\Http\Request;


class DirectController extends Controller
{
    public function index()
    {
        return view('direct.chat');
    }

    public function saveChat(Request $request)
    {
        Direct::create([
            'from_id' => $request->sender,
            'to_id' => $request->receiver,
            'message' => $request->message
        ]);

        return back();
    }
}
