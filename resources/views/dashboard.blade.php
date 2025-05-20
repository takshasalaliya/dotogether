<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media (max-width: 768px) {
            .card {
                padding: 1rem;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
@extends('layout')
@section('dashboard')
@if(session('message'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif

    <!-- Main Content Section -->
    <main class="container mx-auto my-8 p-4 bg-white shadow-md rounded-lg">
        <section>
            <h1 class="text-2xl font-bold mb-6 text-center">User Projects</h1>
            <div class="grid gap-6">
                <!-- User Project Card -->
                 @foreach($datas as $data)
                 @if($data->user_id!=Auth::user()->id)
                <div class="card p-6 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                    <div class="flex items-center mb-4">
                        <img src="user1.png" alt="User Profile" class="h-12 w-12 rounded-full mr-4">
                        <div>
                            <h2 class="text-lg font-semibold">{{$data->user->name}}</h2>
                            <p class="text-gray-600">Project Title: <span class="font-medium">{{$data->title}}</span></p>
                            <p class="text-gray-600">Project Short Detail: <span class="font-medium">{{$data->description}}</span></p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-700 font-semibold">Attachment:</p>
                        <a href="assets/{{$data->file}}" class="text-blue-600 hover:underline" target="_blank">project-details</a>
                    </div>
                    <div class="mt-6 flex justify-center items-center">
                        <form action="project_request" method="post">
                        @csrf
                        <button class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-transform duration-200 ease-in-out mx-2 focus:outline-none focus:ring-2 focus:ring-green-400 accept-btn" value="{{Auth::user()->id.'@'.$data->id}}" name="button">
                            <span class="mr-2">✔</span>Accept
                        </button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section>
    </main>

    <!-- Notifications Section -->
    <div id="notification" class="fixed right-6 top-6 bg-blue-500 text-white p-3 rounded-md shadow-md hidden">
        <span id="notificationContent"></span>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', () => {
    const mobileMenu = document.getElementById('mobileMenu');
    mobileMenu.classList.toggle('hidden');
});

    </script>
    @endsection
</body>
</html>
