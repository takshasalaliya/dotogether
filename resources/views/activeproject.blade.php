@extends('layout')

@section('active_project')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>let projected_id=0;</script>
</head>
<body class="bg-light-blue-100">
@if(session('message'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif
    <div class="container mx-auto p-6">
        <h2 class="text-3xl font-bold text-blue-600 mb-4">Active Projects</h2>

        <div class="bg-white p-4 shadow-md rounded-lg">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-500 text-white">
                        <th class="p-2 text-left">Project Name</th>
                        <th class="p-2 text-left">Status</th>
                        <th class="p-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach($datas as $data)
                        <tr class="border-b">
                            <td class="p-2">{{$data->document->title}} </td>
                            <td class="p-2">
                                <div class="bg-yellow-200 text-green-700 px-3 py-1 rounded inline-block">
                                   {{$data->project_status}}
                                </div>
                            </td>
                            <td class="p-2">
                                <a href="{{ 'detail/'.$data->project_id }}"><button class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                    View Details
                                </button></a>
                                @if(Auth::user()->id==$data->document->user_id)
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                   <a href="{{'deactive/'.$data->project_id}}"> {{$data->project_status=='active'?'Deactive':'Active'}}</a>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Popup -->
    <div id="projectModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-1/3">
            <h3 class="text-xl font-bold text-blue-600" id="modalTitle">Project Details</h3>
            <p class="mt-2 text-gray-600">Project Members:</p>

            <div id="memberDetails" class="mt-3">
            
                    <div class="bg-gray-100 p-2 rounded mt-2">
                        <p><strong>Name:</strong> $member->name</p>
                        <p><strong>Email:</strong> $member->emai</p>
                        <p><strong>Phone:</strong> $member->phon</p>
                       
                    </div>
                
            </div>

            <!-- File Upload -->
            <form class="mt-4" action="" method="POST" enctype="multipart/form-data">
                @csrf
                <label class="block text-gray-700 font-bold mb-2">Upload Project Update:</label>
                <input type="file" name="project_file" class="border rounded p-2 w-full">
                <button type="submit" class="mt-3 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Upload
                </button>
            </form>

            <button class="mt-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600" onclick="closeModal()">
                Close
            </button>
        </div>
    </div>

    <!-- JavaScript for Modal -->
   

</body>
</html>
@endsection
