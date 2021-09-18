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
        <form action="{{ route('auth.login')}}" method="POST">
           <x-show_error/>  {{-- component for input errors --}}
          <x-show_message/> {{-- component for message successfull registration --}}
          <x-show_alert/>   {{-- component for invalid input --}}
          @csrf
          <input type="text" placeholder="username" name="username">
          <input type="password" placeholder="Password" name="password">


          <button type="submit">LOG-IN</button>

        </form>
      </div>
  
    </div>
    </div>
</div>
@endsection