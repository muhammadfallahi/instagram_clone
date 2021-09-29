@extends('layouts.main')
@section('title', 'home')
@section('content')


<script src="http://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href={{ asset('css/paginate.css') }}>

    <h1>welcome to instagram_clone home page</h1>
    {{-- @foreach ($users as $user)
        {{$user->username}}  <form action="{{ route('follow.make') }}" method="POST"> 
            
            @csrf

            <button type="submit" class="btn-primary">follow</button>
            <input type="hidden" value="{{$user->id}}" name="following">

        
        </form><br>
    @endforeach

    @foreach ($users as $user)
        {{$user->username}}  <form action="{{ route('block.make') }}" method="POST"> 
            
            @csrf

            <button type="submit" class="btn-primary">block</button>
            <input type="hidden" value="{{$user->id}}" name="blocked">

        
        </form><br>
    @endforeach

    @foreach ($users as $user)
    {{$user->username}}  <form action="{{ route('block.delete') }}" method="POST"> 
        @method('DELETE')
        @csrf

        <button type="submit" class="btn-primary">unblock</button>
        <input type="hidden" value="{{$user->id}}" name="blocked">

    
    </form><br>
@endforeach

    @foreach ($users as $user)
        {{$user->username}}  <form action="{{ route('follow.delete') }}" method="POST"> 
            @method('DELETE')
            @csrf

            <button type="submit" class="btn-primary">unfollow</button>
            <input type="hidden" value="{{$user->id}}" name="following">

        
        </form><br>
    @endforeach --}}
    <div class="col-4">

    @foreach ($user->following as $followed)

        @foreach ($followed->posts as $post)
    

            <x-show_post :post="$post" />
    @endforeach

    @endforeach
</div>


    <script src="{{ asset('js/jquery.easyPaginate.js') }}"></script>
    <script src="{{ asset('js/paginate.js') }}"></script>
@endsection
