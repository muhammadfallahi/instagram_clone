<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function follow(Request $request){
    //    dd($request->following);
    //    DB::table('follow')->insert([
    //     'user_id' => Auth::user()->id,
    //     'follow' => $request->following
    //    ]);

    $user = Auth::user();
    $user->follow()->sync($request->following);
       return back();
    }

    public function unfollow(Request $request){
        //    dd($request->following);
           DB::table('follow')->where([
               'user_id' =>Auth::user()->id,
               'follow' =>$request->following
           ])->delete();

       return back();

        }
}
