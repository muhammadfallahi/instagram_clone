@extends('layouts.auth')
@section('title', 'login')
@section('content')

<link rel="stylesheet" href={{ asset('css/login.css') }}>

<div class="parent clearfix">
  <div class="bg-illustration">

    <div class="burger-btn">
    </div>

  </div>
  
  <div class="auth">
    <div class="container">
      <h1>Login to access to<br />your account</h1>
  
      <div class="auth-form">
        <form action="" method="POST">
          @csrf
          <input type="email" placeholder="E-mail Address" name="email">
          <input type="password" placeholder="Password" name="password">


          <button type="submit">LOG-IN</button>

        </form>
      </div>
  
    </div>
    </div>
</div>
@endsection