
 <form action="{{ route('follow.delete') }}" method="POST">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn-primary">unfollow</button>
    <input type="hidden" value="{{ $id }}" name="following">


</form><br>
