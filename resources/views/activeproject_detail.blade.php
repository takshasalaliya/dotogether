@extends('layout')

@section('project_detail')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-light-blue-100">
@if(session('message'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-blue-600">Project Details</h2>
            <a href="/active" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Back to Projects
            </a>
        </div>

        <div class="bg-white p-6 shadow-md rounded-lg mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-bold text-blue-600 mb-4">Project Information</h3>
                    <div class="space-y-3">
                        <p><span class="font-bold">Project Name:</span> {{ $detail->document->title }}</p>
                        <p><span class="font-bold">Status:</span> 
                            <span class="bg-yellow-200 text-green-700 px-3 py-1 rounded inline-block">
                                {{ $detail->project_status }}
                            </span>
                        </p>
                        <p><span class="font-bold">Created Date:</span> {{ $detail->created_at->format('d M Y') }}</p>
                        <p><span class="font-bold">Last Updated:</span> {{ $detail->updated_at->format('d M Y') }}</p>
                    </div>
                    
                    @if(Auth::user()->id == $detail->document->user_id)
                    <div class="mt-4">
                        <a href="{{ url('deactive/'.$detail->project_id) }}" 
                           class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                            {{ $detail->project_status == 'active' ? 'Deactivate Project' : 'Activate Project' }}
                        </a>
                    </div>
                    @endif
                </div>
                
                <div>
                    <h3 class="text-xl font-bold text-blue-600 mb-4">Project Description</h3>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p>{{ $detail->document->description ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>  
        </div>

        <div class="bg-white p-6 shadow-md rounded-lg mb-6">
            <h3 class="text-xl font-bold text-blue-600 mb-4">Project Members</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($projects as $member)
                <div class="bg-gray-100 p-4 rounded-lg">
                    <p><span class="font-bold">Name:</span> {{ $member->user->name }}</p>
                    <p><span class="font-bold">Email:</span> {{ $member->user->email }}</p>
                    <p><span class="font-bold">Phone:</span> {{ $member->user->phone }}</p>
                    <p><span class="font-bold">Country:</span> {{ $member->user->country }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white p-6 shadow-md rounded-lg mb-6">
            <h3 class="text-xl font-bold text-blue-600 mb-4">Project Files</h3>
            
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="p-2 text-left">File Name</th>
                            <th class="p-2 text-left">Uploaded By</th>
                            <th class="p-2 text-left">Upload Date</th>
                            <th class="p-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($files as $file)
                        <tr class="border-b">
                            <td class="p-2">{{ $file->file }}</td>
                            <td class="p-2">{{ $file->user->name }}</td>
                            <td class="p-2">{{ $file->created_at->format('d M Y') }}</td>
                            <td class="p-2">
                                <a href="/assets/{{$file->file}}" target="_blank    n"
                                   class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                    Download
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-2 text-center">No files uploaded yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- File Upload -->
            <div class="mt-6">
                <h4 class="font-bold text-lg mb-2">Upload New File</h4>
                <form action="{{ '/upload_file/'.$detail->project_id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col md:flex-row gap-4">
                        <input type="file" name="file" class="border rounded p-2 flex-grow" required>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>

       
    </div>
</body>
</html>
@endsection