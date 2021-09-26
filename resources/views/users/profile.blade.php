@extends('layouts.main')
@section('title', 'profile')
@section('content')


    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href={{ asset('css/paginate.css') }}>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="d-flex justify-content-center align-items-center rounded">
                    @php
                        $path = $user->images->last()->path ?? null;
                        $newpath = str_replace('public', 'storage', "$path");
                    @endphp
                    <img src="{{ asset($newpath) }}" width="140" height="140" alt="n">
                </div>
            </div>
            <div class="col-8">
                <div>
                    <h1> {{ $user->name }} </h1>
                </div>
                <div class="row mt-3">
                    <div class="col-2">
                        <div>
                            <h4>{{ $user->posts->count() }} Posts</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <h4>{{ DB::table('follow')->where('follow', "$user->id")->count() }} followers</h4>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <h4>{{ $user->follows->count() }} following</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="mt-3">
    <div class="col-4">
        <h1 class="text-center">posts</h1><br>
        @foreach ($user->posts as $post)
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
                                    <img class="card-img-top" src="{{ asset($newpath) }}" width="367px"
                                        height="367px" />
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
        @endforeach
    </div>

    <div class="col-4">
        <h1 class="text-center"> tagged posts</h1><br>

        @php
            $mentions = DB::table('mention')
                ->where('user_id', "$user->id")
                ->get();
        @endphp

        @foreach ($mentions as $mention)
            @php
                $post = App\Models\post::find($mention->post_id);
            @endphp

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
                                        <img class="card-img-top" src="{{ asset($newpath) }}" width="367px"
                                            height="367px" />
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
        @endforeach
    </div>

    <div class="col-4">
        <h1 class="text-center">saved posts</h1>

    </div>


    <script src="{{ asset('js/jquery.easyPaginate.js') }}"></script>
    <script src="{{ asset('js/paginate.js') }}"></script>

@endsection
