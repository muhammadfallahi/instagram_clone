<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.home',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {

        // $lastid = DB::table('images')->lastinserid();
        // $lastid = Image::latest()->first()->id; //use last image id for making the name of image unique
        $name = $request->file('file')->getClientOriginalName();  // get the name of picture from user device
        $path = $request->file('file')->storeAs('public/images',$name); // store in images folder in public
        $image = Image::create([
            'title' => $name,
            'path' => "storage/images/$name",
            'imageable_id' => $user->id,
            'imageable_type' =>'app\models\user'
        ]);

        $newrequest = $request->validated();
        if(!$request->password)
             $newrequest['password'] = $request->current_password;

        if (!array_key_exists('public',$newrequest)) {  //if private checkbox is not check public key dosen't exist
            $newrequest['public'] = false;
        }


        
        $user->update($newrequest);
        return redirect()->route('user.index')->with('message', 'update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
