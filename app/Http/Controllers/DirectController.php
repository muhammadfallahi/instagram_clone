<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectRequest;
use App\Models\Direct;
use Illuminate\Http\Request;


class DirectController extends Controller
{
    public function index()
    {
        return view('direct.chat');
    }

    public function saveChat(DirectRequest $request)
    {
        Direct::create([
            'from_id' => $request->sender,
            'to_id' => $request->receiver,
            'message' => $request->message
        ]);

        // return redirect()
        // ->route('direct.messages', ['id' => $request->receiver]);
        return $this->messages($request->receiver);
    }

    public function messages($id){
     
        $messages = Direct::where(function($query) use($id)
        {
            $query->where("from_id", auth()->user()->id)
            ->where("to_id", $id );
        })
        ->orwhere(function($query) use ($id)
        {
            $query->where("from_id", $id)
            ->where("to_id", auth()->user()->id );
        })->get();

        return back()
        ->with('allmessages', $messages)
        ->with('id', $id);
    }
}
