<!doctype html>
<html lang="en">
  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href={{ asset('css/navbar.css') }}>

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar">
      <div class="nav-wrapper">
        <a href="{{ route('user.index') }}">
          <img src="{{ asset('images/instagram_clone.png') }}" class="brand-img" alt="">
        </a>
          <input type="text" class="search-box mb-3" id="inputsearch" name="search" placeholder="search">
          <div class="mt-5 col-1"><br><ul id="searchresult" class="mt-5 bg-white" style="display: none; list-style-type: none; width:200px"></ul></div>
          <div class="nav-items">
            <a href="{{ route('user.index') }}"><img src="{{ asset('images/home.png') }}" class="icon" alt=""></a>
            <a href="{{ route('user.show', [Auth::user()]) }}"><img src="{{ asset('images/profile.png') }}" class="icon" alt=""></a>
            <a href="{{ route('user.edit', [Auth::user()]) }}"><img src="{{ asset('images/setting.png') }}" class="icon" alt=""></a>
            <a href="{{ route('post.create') }}"><img src="{{ asset('images/post.png') }}" class="icon" alt=""></a>
            <a href="{{ route('explore.index') }}"><img src="{{ asset('images/explore.png') }}" class="icon" alt=""></a>
            <a href=""><form style="display:inherit" method="post" action="{{ route('auth.logout') }}">
              @csrf
              <button type="submit" class="btn btn-outline-light; pointer-events: none;" style="width:1px">
                <img src="{{ asset('images/logout.png') }}" class="icon" width="23px" alt="">
              </button></form></a>
              
            
            
            


              <div class="icon user-profile"></div>
          </div>
      </div>
  </nav>
    
<div class="container mt-5">
    <div class="row">
      <x-show_error/>
      <x-show_message/>
      <x-show_alert/>


        @yield('content')
    </div>
</div>
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

  </body>
</html>