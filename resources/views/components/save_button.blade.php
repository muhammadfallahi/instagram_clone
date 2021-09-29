<div>
    @if (DB::table('save')->where(['user_id' => Auth::user()->id, 'post_id' =>  $postid ])->exists())
    <form class="justify-content-end" action="{{ route('unsave.post', [$postid]) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-outline-light; pointer-events: none;" style="width:1px">
            <img src="{{ asset('images/unsave.ico') }}" class="icon" width="30px" alt="">
        </button>
    </form>
@else
    <form class="justify-content-end" method="post" action="{{ route('save.post', [$postid]) }}">
        @csrf
        <button type="submit" class="btn btn-outline-light; pointer-events: none;" style="width:1px">
            <img src="{{ asset('images/save.ico') }}" class="icon" width="30px" alt="">
        </button>
    </form>
@endif


</div>