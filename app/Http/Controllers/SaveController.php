<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveController extends Controller
{

    public function index()
    {
        $posts = auth()->user()->saves()->Paginate(3);    //used for show user saved message in profile
        return back()
        ->with('act3', 'active')
        ->with('posts', $posts);
    }



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
