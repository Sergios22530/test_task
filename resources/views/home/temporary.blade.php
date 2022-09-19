@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
            <a class="btn btn-lg btn-success" href="javascript:void(0);" onclick="imFeelingLuckyHandler(this)" data-user="{{ Auth::user()->id }}" role="button">Im feeling lucky</a>
            <a class="btn btn-lg btn-info" href="javascript:void(0);" onclick="historyHandler(this)" data-user="{{ Auth::user()->id }}" role="button">History</a>
            <a class="btn btn-lg btn-warning" href="javascript:void(0);" onclick="generateLinkHandler(this)" data-user="{{ Auth::user()->id }}" role="button">Generate New Link</a>
            <a class="btn btn-lg btn-danger" href="javascript:void(0);" onclick="deleteLinkHandler(this)" data-user="{{ Auth::user()->id }}" role="button">Delete Current Link</a>
        @endauth
    </div>
@endsection

