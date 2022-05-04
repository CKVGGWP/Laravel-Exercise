<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Laravel Application</title>
</head>

<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a href="/" class="p-3">Home</a></li>
            @auth
                <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
            @endauth
            <li><a href="{{ route('post') }}" class="p-3">Post</a></li>
        </ul>

        <ul class="flex items-center">
            @auth
                <li><a href="#" class="p-3">{{ auth()->user()->name }}</a></li>
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
