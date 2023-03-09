@extends('layouts.app-master')

@section('content')


<div class="bg-light p-5 rounded">
    @auth
        <h1>Dashboard</h1>
        <p>Only authenticated users can access this section!</p>

        @can('isAdmin')
            <button class="btn btn-success btn-lg">Admin Access</button>
        @elsecan('isManager')
            <button class="btn btn-success btn-lg">Manager Access</button>
        @else
            <button class="btn btn-success btn-lg">Branch Manager Access</button>
        @endcan

    @endauth

    @guest
        <h1>Home Page</h1>
        <p>You a re in home page!</p>
    @endguest
</div>

    
    

@endsection