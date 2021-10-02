<form action="{{ route('block.delete') }}" method="POST">
    @method('DELETE')
    @csrf

    <button type="submit" class="btn-primary">unblock</button>
    <input type="hidden" value="{{ $id }}" name="blocked">


</form>
