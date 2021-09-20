@extends('layouts.main')
@section('title', 'profile')
@section('content')
   
    
  <div class="col-4">
    <h1 class="text-center">posts</h1>
    @foreach ($user->posts as $post)
    <div class="card-deck">
        <div class="card mt-5">
            
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->content}}</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">{{$post->created_at}}</small>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="col-4">
    <h1 class="text-center"> tagged posts</h1>
        
        {{$user->name}} <br>
        {{$user->id}}  <br>
    {{-- count of user posts  --}}
        count of posts: {{$user->posts->count()}}   <br> 
        @foreach ($user->posts as $post)
        @foreach ($post->images as $image)
        {{$image->title}}
        @endforeach
           
        @endforeach
    </div>

    <div class="col-4">
    <h1 class="text-center">saved posts</h1>
        
    </div>
    
@endsection
