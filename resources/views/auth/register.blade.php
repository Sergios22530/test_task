@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('register.perform') }}">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
            <label for="floatingName">Username</label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Phone number</label>
            @if ($errors->has('phone_number'))
                <span class="text-danger text-left">{{ $errors->first('phone_number') }}</span>
            @endif
        </div>



        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>

        @include('auth.partials.copy')
    </form>
@endsection
