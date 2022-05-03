@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white rounded-lg w-4/12 p-6">
            @if (session('status'))
                <div class="bg-red-500 text-white text-sm text-center p-3 mb-2 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('loginForm') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                        Username
                    </label>
                    <input type="text" name="username" id="username"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                    @error('username') border-red-500 @enderror"
                        placeholder="Username" value="{{ old('username') }}">
                    @error('username')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                        Password
                    </label>
                    <input type="password" name="password" id="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                    @error('password') border-red-500 @enderror"
                        placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <div class="mb-4 flex justify-start items-start">
                    <input type="checkbox" name="remember" id="remember" class="mr-2" placeholder="Remember Me">
                    <label for="remember" class="text-gray-700 text-sm font-bold">
                        Remember Me
                    </label>
                </div> --}}
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Login
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
