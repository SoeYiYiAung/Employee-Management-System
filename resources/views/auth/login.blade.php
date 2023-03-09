@extends('layouts.auth-master')

@section('content')

    <form method="post" action="{{route('login.loginUser')}}">
        @csrf
        <h1>Login User</h1>
        <div class="form-group mb-3">
            <input type="text" name="name" class="form-control" required placeholder="Username">
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" class="form-control" required placeholder="Password">
        </div>

        <button class="btn btn-lg btn-primary" type="submit">Login</button>

    </form>
    
@endsection
