@extends('layouts.main')
@section('title', 'profile')
@section('content')


    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href={{ asset('css/paginate.css') }}>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center align-items-center rounded">
                    @php
                        $path = $user->images->last()->path ?? null;
                        $newpath = str_replace('public', 'storage', "$path");
                    @endphp
                    <img src="{{ asset($newpath) }}" width="140" height="140" alt="n">
                </div>
            </div>
            <div class="col-8">
                <div>
                    <h1> {{ $user->name }} </h1>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <div>
                            <h4>{{ $user->posts->count() }} Posts</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <h4>{{ $user->follower->count() }} followers</h4>

                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <h4>{{ $user->following->count() }} following</h4>
                        </div>
                        {{-- use for follow and unfollow button --}}
                        @if (Auth::user()->id !== $user->id) 
                        @if (in_array(Auth::user()->id, $follower))
                        <x-unfollow_button id="{{$user->id}}" />
                            <x-block_button id="{{$user->id}}" />
                        @else
                        <x-follow_button id="{{$user->id}}" />
                        @endif
                        @endif
                        {{-- ---------------------------------- --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">



    <ul class="nav nav-tabs justify-content-between" id="topheader">
        <li class="nav-item">
          <a class="nav-link {{session('act1') ?? ''}}" aria-current="page" href="{{ route('post.index') }}"><h3 class="text-center">posts</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{session('act2') ?? ''}}" href="{{ route('mention.index') }}"><h3 class="text-center">tagged posts</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{session('act3') ?? ''}}" href="{{ route('save.index') }}"><h3 class="text-center">saved posts</h3></a>
        </li>
      </ul>

    @if (session('posts'))
    @foreach (session('posts') as $post)
        <div class="col-4">
            <x-show_post :post="$post" />
        </div>
    @endforeach
    {{ session('posts')->links() }}
    @endif
    


    {{-- <div class="col-4">
        <h1 class="text-center"> tagged posts</h1><br>
        @foreach ($user->mentions as $post)
            <x-show_post :post="$post" />
        @endforeach
    </div>

    <div class="col-4">
        <h1 class="text-center">saved posts</h1><br>
        @foreach ($user->saves as $post)
            <x-show_post :post="$post" />
        @endforeach
    </div> --}}



    <script src="{{ asset('js/jquery.easyPaginate.js') }}"></script>
    <script src="{{ asset('js/paginate.js') }}"></script>

@endsection
