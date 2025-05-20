<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-light-blue-100">
@extends('layout')
@section('pendingrequest')
@if(session('message'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-blue-600 mb-4">Pending Requests</h2>

        <div class="bg-white p-4 shadow-md rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="p-2 text-left">Project Name</th>
                        <th class="p-2 text-left">Requested By</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    @if($data->document->user_id==Auth::user()->id)
                    <tr class="border-b">
                        <td class="p-2">{{$data->document->title}}</td>
                        <td class="p-2">{{$data->user->name}}</td>
                        <td class="p-2 text-yellow-500">Pending</td>
                        <td class="p-2">
                            <a href="{{'opration/'.$data->id.'/1'}}"><button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"  >Accept</button></a>
                            <a href="{{'opration/'.$data->id.'/0'}}"><button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" >Reject</button></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
</body>
</html>
