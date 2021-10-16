@extends('layouts.main')
@section('title', 'home')

@section('content')
<script src="http://code.jquery.com/jquery-latest.js"></script>

<link rel="stylesheet" href={{ asset('css/activity.css') }}>


<div class="row notification-container">
    <h2 class="text-center">My Notifications</h2>
    <p class="dismiss text-end"><a id="dismiss-all" href="#">Dismiss All</a></p>
    @foreach ($commentnotifications as $commentnotification)
    <div class="card notification-card notification-invitation">
      <div class="card-body">
        <table>
          <tr>
            <td style="width:70%"><div class="card-title">post {{$commentnotification->data['comment-id']}} have new comment</div></td>
            <td style="width:30%">
            <form action="{{ route('show.activity',[$commentnotification->data['comment']]) }}" method="post">
              @csrf
              <button class="btn btn-primary">View</button>
              <button class="btn btn-danger dismiss-notification">mark as read</button>
            </form>
            </td>
          </tr>
        </table>
      </div>
    </div>
@endforeach
  </div>

  <script src="{{ asset('js/activity.js') }}"></script>
@endsection