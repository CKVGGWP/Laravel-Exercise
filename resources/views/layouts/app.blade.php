<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Laravel Application</title>
</head>

<body class="bg-gray-200">
    @auth
        <nav class="p-6 bg-white flex justify-between mb-6">
        @else
            <nav class="p-6 bg-white flex justify-end mb-6">
            @endauth

            @auth
                <ul class="flex items-center">
                    <li><a href="#" class="p-3">Home</a></li>
                    <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
                    <li><a href="{{ route('post') }}" class="p-3">Post</a></li>
                </ul>
            @endauth

            <ul class="flex items-center">
                @auth
                    <li><a href="#" class="p-3">Name</a></li>
                    <form action="{{ route('logout') }}" method="POST" class="inline p-3">
                        @csrf
                        <li><button type="submit">Logout</button></li>
                    </form>
                @else
                    <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                    <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
                @endauth
            </ul>
        </nav>
        @yield('content')
</body>

</html>
