<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectRequest;
use App\Models\Direct;
use App\Models\User;
use Illuminate\Http\Request;


class DirectController extends Controller
{
    public function index()
    {
        $from = [];
        $to = [];
        $communicates = [];
        $user_accounts = [];
        $directs = Direct::where('from_id', auth()->user()->id)
        ->orwhere('to_id', auth()->user()->id)
        ->get();
        
       

        foreach ($directs as $direct) {
            if (in_array($direct->from_id, $from)) {
                continue;
            }else{
            array_push($from, $direct->from_id);
            }
        }

        foreach ($directs as $direct) {
            if (in_array($direct->to_id, $to)) {
                continue;
            }else{
            array_push($to, $direct->to_id);
            }
        }

        $combines = array_merge($from, $to);
        foreach ($combines as $combine) {
            if (in_array($combine, $communicates)) {
                continue;
            }else{
            array_push($communicates, $combine);
            }
        }


        foreach ($communicates as $communicate) {
            $user = User::find($communicate);
            array_push($user_accounts, $user);
        }

        
        return view('direct.chat',compact('user_accounts'));
    }



    public function saveChat(DirectRequest $request)
    {
        $blockes = User::find($request->receiver)->blocks;
        foreach ($blockes as $block) {
            if ($block->id == auth()->user()->id) {
                return $this->messages($request->receiver)
                ->with('alert', "this user blocked you and you can't send message for him ");
            }
        }
        Direct::create([
            'from_id' => $request->sender,
            'to_id' => $request->receiver,
            'message' => $request->message
        ]);

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

        $receiver = User::find($id);

        return back()
        ->with('allmessages', $messages)
        ->with('receiver', $receiver);
    }
}
