<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', Auth::user()->id)
        ->paginate(3);
        return back()
        ->with('act1', 'active')
        ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return back()
        ->with('create_post_active', 'active');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        
        $newrequest =$request->validated();


        if (!array_key_exists('allow_comment',$newrequest)) {  //if allow_comment checkbox is not check allow_comment key dosen't exist
            $newrequest['allow_comment'] = false;
        }

        $post = Post::create([
            'user_id' =>Auth::user()->id,
            'title' => $newrequest['title'],
            'content' => $newrequest['content'],
            'allow_comment' =>$newrequest['allow_comment']
        ]);

         

        $files = $request->file('file-data');
        foreach ($files as $file) {
            $path = $file->store('public/images');
            $image = Image::create([
                'title' => $request->title,
                'path' => $path,
                'imageable_id' => $post->id,
                'imageable_type' =>'app\models\post'
            ]);
        }

         //use this for mention the user in posts

         if (Str::contains($newrequest['content'], '@')) {   
            preg_match_all('/(?<=\@)\w+/', $newrequest['content'], $matches);
            foreach ($matches[0] as $match) {
                $users = user::all();
                foreach ($users as $user) {
                    if ($user->username == $match) {
                        DB::table('mention')->insert([
                            'user_id' => $user->id,
                            'post_id' => $post->id
                        ]);
                    }
                }

            }
        }

         //use this for make tags


        if (Str::contains($newrequest['content'], '#')) {   
            preg_match_all('/(?<=\#)\w+/', $newrequest['content'], $matches);
            foreach ($matches[0] as $match) {
                    Tag::create([
                        'title' => $match,
                        'post_id' => $post->id,
                    ]);
                }
            }
        

       

        return redirect()->route('user.index')->with('message','post created successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
