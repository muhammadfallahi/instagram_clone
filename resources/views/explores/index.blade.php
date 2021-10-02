@extends('layouts.main')
@section('title', 'explore')
@section('content')



    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href={{ asset('css/paginate.css') }}>


    @foreach ($mostlike as $post)
        <div class="col-4">
            <x-show_post :post="$post" />
        </div>

    @endforeach


    <script src="{{ asset('js/jquery.easyPaginate.js') }}"></script>
    <script src="{{ asset('js/paginate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/LiveSearch.js') }}"></script>
   
@endsection
