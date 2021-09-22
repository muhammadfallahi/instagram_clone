@extends('layouts.main')
@section('title', 'home')
@section('content')
    <h1>welcome to instagram_clone home page</h1>
    @foreach ($users as $user)
        {{$user->name}}  <form action="{{ route('follow.make') }}" method="POST"> 
            
            @csrf

            <button type="submit" class="btn-primary">follow</button>
            <input type="hidden" value="{{$user->id}}" name="following">

        
        </form><br>
    @endforeach

    @foreach ($users as $user)
        {{$user->name}}  <form action="{{ route('follow.delete') }}" method="POST"> 
            @method('DELETE')
            @csrf

            <button type="submit" class="btn-primary">unfollow</button>
            <input type="hidden" value="{{$user->id}}" name="following">

        
        </form><br>
    @endforeach
@endsection
