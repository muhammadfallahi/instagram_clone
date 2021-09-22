<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            // $name = $file->getClientOriginalName();
            $path = $file->store('public/images');
            $image = Image::create([
                'title' => $request->title,
                'path' => $path,
                'imageable_id' => $post->id,
                'imageable_type' =>'app\models\post'
            ]);
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
