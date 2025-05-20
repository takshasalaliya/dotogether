<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dotogether User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Sticky Navigation Header -->
   @extends('layout')
   @section('profile')
   @if(session('message'))
    <div class="bg-green-500 text-white p-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif
    <!-- Main Profile Content -->
    <main class="mt-16 flex justify-center">
        <div class="max-w-4xl w-full p-4">
            <!-- Profile Header -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center">
                    <img class="h-20 w-20 rounded-full" src="profile_picture.png" alt="Profile Picture">
                    <div class="ml-4">
                        <h2 class="text-xl font-bold">{{Auth::user()->name}}</h2>
                        <p class="text-sm text-gray-500">User{{Auth::user()->id}}</p>
                        <p class="text-sm text-gray-500">{{Auth::user()->created_at}}</p>
                        <p class="text-sm text-gray-500">Age: {{Auth::user()->age}}</p>
                    </div>
                </div>
            </section>

            <!-- Personal Information -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-bold mb-3">Personal Information</h3>
                <div class="space-y-2">
                    <p><strong>Name:</strong>{{Auth::user()->name}}</p>
                    <p><strong>Mobile Number:</strong>{{Auth::user()->mobile}}</p>
                    <p><strong>Country:</strong>{{Auth::user()->country}}</p>
                    <div>
                        <span class="block text-sm font-bold">Skills:</span>
                        <div class="flex space-x-2 overflow-x-auto">
                            <?php
                            $skills=Auth::user()->skill;
                            $skills=explode(',',$skills);
                            ?>
                            @foreach($skills as $skill)
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded">#{{$skill}}</span>
                            @endforeach
                        </div>
                    </div>
                    <button id="editProfileButton" class="mt-3 bg-green-500 text-white px-4 py-2 rounded">Edit Profile</button>

                </div>
            </section>

            <!-- Projects Section -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-bold mb-3">Uploaded Projects (Total: {{count($projects)}})</h3>
                @foreach($projects as $data)
                <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded shadow-md hover:shadow-lg">
                        <h4 class="font-bold text-lg">{{$data->title}}</h4>
                        <p class="text-sm text-gray-600 mt-2">{{$data->description}}</p>
                        <div class="mt-4">
                            <span class="bg-gray-200 p-1 text-sm rounded">#{{$data->language}}</span>
                        </div>
                       <a href="assets/{{$data->file}}" target="_blank"> <div class="mt-4 text-sm text-blue-600">View Details</div></a>
                       <a href="/delete/{{$data->id}}"> <div class="mt-4 text-sm text-blue-600">Delete</div></a>
                    </div>
                    <!-- More project cards can be added similarly -->
                </div>
                <br><br>
                @endforeach
            </section>
        </div>
    </main>
    <div 
        id="editProfileModal" 
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white w-full max-w-md rounded-lg p-6 shadow-lg relative">
            <button 
                id="closeModalButton" 
                class="absolute top-2 right-2 text-gray-400 hover:text-gray-600">
                ✖
            </button>
            <h3 class="text-lg font-bold mb-4">Edit Profile</h3>
            <form id="editProfileForm" action="editprofile" method="get">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" disabled id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{Auth::user()->name}}">
                </div>
                <div class="mb-4">
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="number" id="age" name="age" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{Auth::user()->age}}">
                </div>
                <div class="mb-4">
                    <label for="mobile" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                    <input type="text" id="mobile" name="mobile" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{Auth::user()->mobile}}">
                </div>
                <div class="mb-4">
                    <label for="skills" class="block text-sm font-medium text-gray-700">Skills (use , for Seperate)</label>

                    <input type="text" id="skills" name="skills" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{Auth::user()->skill}}">
                </div>
                <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                    <input type="text" id="country" name="country" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" value="{{Auth::user()->country}}">
                </div>
                <div class="flex justify-end">
                <button type="submit" id="saveProfileButton" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
    Save Changes
</button>

                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    
<script>
    document.getElementById('editProfileButton').addEventListener('click', () => {
            document.getElementById('editProfileModal').classList.remove('hidden');
        });

        // Close modal
        document.getElementById('closeModalButton').addEventListener('click', () => {
            document.getElementById('editProfileModal').classList.add('hidden');
        });

        // Save Profile (Add your save logic here)
        document.getElementById('saveProfileButton').addEventListener('click', () => {
            const formData = new FormData(document.getElementById('editProfileForm'));
            console.log('Form Data:', Object.fromEntries(formData.entries()));
            document.getElementById('editProfileModal').classList.add('hidden');
            alert('Profile updated successfully!');
        });
        document.getElementById('saveProfileButton').addEventListener('click', () => {
    const formData = new FormData(document.getElementById('editProfileForm'));
    
    // Use AJAX to submit the form data
    $.ajax({
        url: '/editprofile', // Your server route
        method: 'get', // Adjust this if you use a different HTTP method
        data: Object.fromEntries(formData.entries()),
        success: function(response) {
            console.log('Profile updated:', response);
            alert('Profile updated successfully!');
            document.getElementById('editProfileModal').classList.add('hidden');
        }
       
    });
});

    </script>
</script>
@endsection('profile')
</body>
</html>