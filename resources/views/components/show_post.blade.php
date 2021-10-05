<div class="card-deck">
    <div class="card mt-5" style="position: inherit">
        <div class="p-3">
            <strong>{{ $post->user->username }}</strong>
            <hr>

        </div>
        <div id="easyPaginate{{ $post->id }}">

            @foreach ($post->images as $image)
                <div>
                    @php
                        $path = $image->path;
                        $newpath = str_replace('public', 'storage', "$path");
                        $extension = pathinfo(storage_path($newpath), PATHINFO_EXTENSION);
                    @endphp

                    @if ($extension == 'mp4')
                        <video class="card-img-top" controls width="367" height="367">
                            <source src="{{ asset($newpath) }}" type="video/mp4">
                        </video>

                    @else
                        <img class="card-img-top" src="{{ asset($newpath) }}" width="367px" height="367px" />
                    @endif
                </div>
            @endforeach

        </div>
        <div class="card-body">

            <x-save_button postid="{{ $post->id }}" />
            <x-like_button id="{{ $post->id }}" type="Post" />


            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <div class="card-footer">
            <small class="text-muted">
                <h4>comments</h4>

                @include('comments.comment', ['comments' => $post->comments, 'post_id' => $post->id])
               
            </small>
            <div class="card-body">
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="comment" placeholder="Leave comment...">
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        <button class="btn btn-info" type="submit">send</button>
                    </div>
                </form>
        </div>
    </div>
</div>
