<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRequest;
use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $users = User::all()->except(Auth::id());
        $user = Auth::user();
        return view('users.home',compact('user'));
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
        if (Auth::user() == $user) {
            return view('users.edit',compact('user'));
        }
        return back()->with('alert', 'your not login with this user id');
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

        
        if($request->has('file')){
        $path = $request->file('file')->store('public/images'); // store in images folder in public
    
        $image = Image::create([
            'title' => $user->name,
            'path' => $path,
            'imageable_id' => $user->id,
            'imageable_type' =>'app\models\user'
        ]);
    }

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
