@extends('layouts.app')

@section('title','testing blade')

@section('content')
    <h1 class="text-2xl font-semibold">{{ $view_name }} view</h1>
    <p class="text-gray-700">This is just test {{ $name }}</p>
@endsection