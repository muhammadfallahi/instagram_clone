@extends('layouts.main')
@section('title', 'profile')
@section('content')
    <h1>this is profile page</h1>
    {{$user->name}}
@endsection
