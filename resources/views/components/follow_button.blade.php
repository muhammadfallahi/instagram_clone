<form action="{{ route('follow.make') }}" method="POST">

    @csrf

    <button type="submit" class="btn-primary">follow</button>
    <input type="hidden" value="{{ $id }}" name="following">


</form><br>
