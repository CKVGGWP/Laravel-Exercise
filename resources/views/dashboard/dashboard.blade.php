@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white rounded-lg w-8/12 p-6">
            Dashboard

            <div class="rounded-lg w-full p-2 flex flex-col sm:flex-row justify-between">
                <div class="bg-gray-100 border-2 w-full p-4 rounded-lg mr-0 mb-2 sm:mr-2 sm:mb-0">
                    <p class="text-gray-700 text-base">
                        Total Number of Users: {{ $users }}
                    </p>
                </div>
                <div class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                    <p class="text-gray-700 text-base">
                        Total Number of Comments: {{ $post }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
