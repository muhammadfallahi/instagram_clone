<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveController extends Controller
{
    public function save($id)
    {
        DB::table('save')->insert([
            'user_id' => Auth::user()->id,
            'post_id' => $id,
        ]);

        return back()
               ->with('message', 'post saved');
    
    }

    public function unsave($id)
    {
        DB::table('save')->where([
            'user_id' => Auth::user()->id,
            'post_id'=> $id
        ])->delete();

        return back()
        ->with('message', 'post unsaved');

    }

}
