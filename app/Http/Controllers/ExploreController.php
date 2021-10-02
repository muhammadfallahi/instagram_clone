<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;


class ExploreController extends Controller
{

    public function index()
    {
        $posts = Post::get();
        $mostlike = [];
        foreach ($posts as $post) {
            $like = DB::table('like')->where([
                'likeable_type' => 'post',
                'likeable_id' => $post->id
            ])->count();
            if ($like > 1) {
                array_push($mostlike, $post);
            }
        }
        $post = DB::table('like')->where([
            'likeable_type' => 'post'
        ])->get();
        return view('explores.index', compact('mostlike'));
    }
}
