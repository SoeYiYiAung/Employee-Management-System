@extends('layouts.auth-master')

@section('content')
    <h1>Register</h1>
    <form action="{{ route('register.registration') }}" method="post">
        @csrf
        <div class="form-group">
            <input type="email" name="email" id="" class="form-control" placeholder="example@gmail.com" required>            
            @if ($errors->has('email'))
                <span class="text-danger">
                    {{$errors->first('email')}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <input type="text" name="name" id="" class="form-control mt-3" placeholder="username" required>
            @if ($errors->has('name'))
                <span class="text-danger">
                    {{$errors->first('name')}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="password" id="" class="form-control mt-3" placeholder="password" required>
            @if ($errors->has('[password]'))
                <span class="text-danger">
                    {{$errors->first('password')}}
                </span>
            @endif
        </div>

        <div class="form-group">
            <input type="password" name="password_confirmation" id="" class="form-control mt-3" placeholder="confirm-password" required>
            <span class="text-danger">
                {{$errors->first('password_confirmation')}}
            </span>
        </div>

        <button type="submit" class="w-10 btn btn-primary form-submit mt-3"> Register </button>
    </form>
@endsection