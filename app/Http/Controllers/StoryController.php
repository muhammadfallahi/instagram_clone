<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStoryRequest;
use App\Models\Image;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
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
        
        return back()
        ->with('create_story_active', 'active');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoryRequest $request)
    {
        $newrequest =$request->validated();

        $story = Story::create([
            'user_id' =>Auth::user()->id,
            'title' => $newrequest['title'],
            'content' => $newrequest['content']
        ]);


        $files = $request->file('file-data');
        foreach ($files as $file) {
            $path = $file->store('public/images');
            $image = Image::create([
                'title' => $request->title,
                'path' => $path,
                'imageable_id' => $story->id,
                'imageable_type' =>'app\models\story'
            ]);
        }

        return redirect()->route('user.index')->with('message','story created successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
    }
}
