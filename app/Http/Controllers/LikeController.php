<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like($id,$type)
    {
        DB::table('like')->insert([
            'user_id' => Auth::user()->id,
            'likeable_type' => $type,
            'likeable_id' => $id
        ]);

        return back()
               ->with('message', 'liked');
    }

    public function delike($id,$type)
    {
        DB::table('like')->where([
            'user_id' => Auth::user()->id,
            'likeable_type' => $type,
            'likeable_id' => $id
        ])->delete();

        return back()
               ->with('message', 'delike');
    }
}
