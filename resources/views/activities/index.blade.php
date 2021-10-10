@extends('layouts.main')
@section('title', 'home')

@section('content')
<script src="http://code.jquery.com/jquery-latest.js"></script>

<link rel="stylesheet" href={{ asset('css/activity.css') }}>

{{-- <h1>this is activity page</h1> --}}
{{-- @foreach ($posts as $post) --}}
    {{-- @foreach ($post->comments as $comment) --}}
        {{-- {{dd($comment->notifications)}} --}}
        {{-- @foreach ($comment->notifications as $notification) --}}
        {{-- {{dd($notification)}} --}}
        {{-- @endforeach --}}
    {{-- @endforeach --}}

{{-- @endforeach --}}

<div class="row notification-container">
    <h2 class="text-center">My Notifications</h2>
    <p class="dismiss text-right"><a id="dismiss-all" href="#">Dimiss All</a></p>
    <div class="card notification-card notification-invitation">
      <div class="card-body">
        <table>
          <tr>
            <td style="width:70%"><div class="card-title">Jane invited you to join '<b>Familia</b>' group</div></td>
            <td style="width:30%">
              <a href="#" class="btn btn-primary">View</a>
              <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    
    <div class="card notification-card notification-warning">
      <div class="card-body">
         <table>
          <tr>
            <td style="width:70%"><div class="card-title">Your expenses for '<b>Groceries</b>' has exceeded its budget</div></td>
            <td style="width:30%">
              <a href="#" class="btn btn-primary">View</a>
              <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    
    <div class="card notification-card notification-danger">
      <div class="card-body">
         <table>
          <tr>
            <td style="width:70%"><div class="card-title">Insufficient budget to create '<b>Clothing</b>' budget category</div></td>
            <td style="width:30%">
              <a href="#" class="btn btn-primary">View</a>
              <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    
    <div class="card notification-card notification-reminder">
      <div class="card-body">
         <table>
          <tr>
            <td style="width:70%"><div class="card-title">You have <b>2</b> upcoming payment(s) this week</div></td>
            <td style="width:30%">
              <a href="#" class="btn btn-primary">View</a>
              <a href="#" class="btn btn-danger dismiss-notification">Dismiss</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
    
    
  </div>

  <script src="{{ asset('js/activity.js') }}"></script>
@endsection