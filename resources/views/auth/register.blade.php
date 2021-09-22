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
        <form action="{{ route('auth.register')}}" method="POST">
          <x-show_error/>  {{-- component for errors --}}
          @csrf
          <input type="text" placeholder="Name" name="name">
          <input type="text" placeholder="Username" name="username">
          <input type="email" placeholder="E-mail Address" name="email">
          <input type="tel" placeholder="phone number" name="phone_number">
          <input type="password" placeholder="Password" name="password">
          <input type="password" placeholder="repeat Password" id="password_confirmation" name="password_confirmation">
          <a href="{{ route('auth.login')}}">login</a>


          <button class="register" type="submit">Register</button>

        </form>
      </div>
  
    </div>
    </div>
</div>
@endsection