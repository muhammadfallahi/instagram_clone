<div>
    @if (DB::table('like')->where(['user_id' => Auth::user()->id, 'likeable_type' =>  $type, 'likeable_id' => $id ])->exists())
    <form class="justify-content-end" action="{{ route('delike.post', [$id,$type]) }}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-outline-light; pointer-events: none;" style="width:1px">
            <img src="{{ asset('images/delike.png') }}" class="icon" width="30px" alt="">
        </button>
    </form>
@else
    <form class="justify-content-end" method="post" action="{{ route('like.post', [$id,$type]) }}">
        @csrf
        <button type="submit" class="btn btn-outline-light; pointer-events: none;" style="width:1px">
            <img src="{{ asset('images/like.png') }}" class="icon" width="30px" alt="">
        </button>
    </form>
@endif

{{DB::table('like')->where(['likeable_type' => 'post', 'likeable_id' => $id])->count()}}
</div>