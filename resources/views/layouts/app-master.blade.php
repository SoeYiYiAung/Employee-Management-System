<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LV Employee Management System</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css')}}">
</head>
<body class="text-center">
    @include('layouts.partials.nav')
    <main class="container">
         @yield('content')
    </main>
    
</body>
</html>