<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlockController extends Controller
{
    public function block(Request $request){
      
        DB::table('block')->insert([
            'user_id' => Auth::user()->id,
            'block' => $request->blocked
        ]);
           return back();
        }
    
        public function unblock(Request $request){
               DB::table('block')->where([
                   'user_id' =>Auth::user()->id,
                   'block' =>$request->blocked
               ])->delete();
    
           return back();
               }
}