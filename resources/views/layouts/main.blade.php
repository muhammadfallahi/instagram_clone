<!doctype html>
<html lang="en">
  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href={{ asset('css/navbar.css') }}>

    <title>@yield('title')</title>
  </head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav> --}}
    <nav class="navbar">
      <div class="nav-wrapper">
        <a href="{{ route('auth.register') }}">
          <img src="{{ asset('images/instagram_clone.png') }}" class="brand-img" alt="">
        </a>
          <input type="text" class="search-box" placeholder="search">
          <div class="nav-items">
            <a href="{{ route('user.index') }}"><img src="{{ asset('images/home.png') }}" class="icon" alt=""></a>
            <a href="{{ route('user.show', [Auth::user()]) }}"><img src="{{ asset('images/profile.png') }}" class="icon" alt=""></a>
            <a href="{{ route('user.edit', [Auth::user()]) }}"><img src="{{ asset('images/setting.png') }}" class="icon" alt=""></a>
            <a href="{{ route('auth.register') }}"><img src="{{ asset('images/home.png') }}" class="icon" alt=""></a>
            <a href="{{ route('auth.register') }}"><img src="{{ asset('images/home.png') }}" class="icon" alt=""></a>
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