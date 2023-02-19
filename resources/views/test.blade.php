@extends('layouts.app')

@section('title','testing blade')

@section('content')
    <div class="w-full grid place-items-center h-full">
        <div class="text-center">
            <h1 class="text-2xl font-semibold">{{ $view_name }} view</h1>
            <p class="text-gray-700">This is just a test view by {{ $name }}</p>
        </div>
    </div>
@endsection