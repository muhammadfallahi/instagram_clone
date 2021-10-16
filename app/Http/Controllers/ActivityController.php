<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use LengthException;

class ActivityController extends Controller
{
    public function index()
    {
        $commentnotifications = [];
       $user =  User::find(auth()->user()->id);
       $posts = $user->posts;
       foreach ($posts as $post) {
            foreach ($post->comments as $comment) {
                foreach ($comment->unreadNotifications as $notification) {
                    array_push($commentnotifications, $notification);
                }
            }
        }
        return view('activities.index',compact('commentnotifications'));
    }

    public function show($commentnotification)
    {
        // $notification =  DB::table('notifications')->where('id', $commentnotification)->value('data');
        // return dd($notification->);
        dd($commentnotification);
    }
}
