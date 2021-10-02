<form action="{{ route('block.delete') }}" method="POST">
    @csrf

    <button type="submit" class="btn-primary">block</button>
    <input type="hidden" value="{{ $id }}" name="blocked">


</form>
