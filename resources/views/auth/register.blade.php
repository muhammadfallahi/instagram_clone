@extends('layouts.auth')
@section('title', 'register')
@section('content')

<link rel="stylesheet" href={{ asset('css/login.css') }}>

<div class="parent clearfix">
  <div class="bg-illustration">
  </div>
  
  <div class="auth">
    <div class="container">
      <h1>Register</h1>
  
      <div class="auth-form">
        <form action="" method="POST">
          @csrf
          <input type="text" placeholder="Name" name="name">
          <input type="text" placeholder="Username" name="username">
          <input type="email" placeholder="E-mail Address" name="email">
          <input type="tel" placeholder="phone number" name="phone_number">
          <input type="password" placeholder="Password" name="password">
          <input type="password" placeholder="repeat Password" name="password_confirmation">



          <button class="register" type="submit">Register</button>

        </form>
      </div>
  
    </div>
    </div>
</div>
@endsection