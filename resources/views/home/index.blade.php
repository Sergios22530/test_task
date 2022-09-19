@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth

            @if ($link)
                <h1>Temporary Link</h1>
                <a class="btn btn-lg btn-primary" href="{{ route('home.task',['link' => $link?->uuid]) }}" role="button">CLICK ME &raquo;</a>
            @endif
        @endauth

        @guest
            <h1>Homepage</h1>
            <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
