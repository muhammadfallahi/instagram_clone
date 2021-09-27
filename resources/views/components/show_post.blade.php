<div class="card-deck">
    <div class="card-deck">
        <div class="card mt-5" style="position: inherit">
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

                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">
                    <h4>comments</h4>
                    @foreach ($post->comments as $comment)
                        <strong>{{ $comment->user->username }}</strong><br>
                        {{ $comment->description }} <br>
                    @endforeach
                </small>
            </div>
        </div>
    </div>
</div>
