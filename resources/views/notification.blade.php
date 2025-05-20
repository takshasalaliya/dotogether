
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dotogether - Manage Project Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.3.0/dist/alpine.js" defer></script>
</head>
<body class="bg-gray-100">

    <!-- Sticky Navigation Header -->
    <header class="bg-white shadow fixed w-full z-10">
        <div class="container mx-auto flex justify-between items-center p-4">
            <div class="flex items-center">
                <img src="logo.png" alt="Dotogether Logo" class="h-8 mr-3">
            </div>
            <div class="flex-grow">
                <input type="text" placeholder="Search projects or users" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div x-data="{ open: false }" @click.away="open = false" class="relative">
                <button @click="open = !open" class="focus:outline-none">
                    <img src="user-avatar.png" alt="User Avatar" class="h-8 w-8 rounded-full">
                </button>
                <div x-show="open" class="absolute right-0 mt-2 bg-white shadow rounded w-48">
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">My Dashboard</a>
                    <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto pt-16 p-4">

        <!-- Request Overview Section -->
        <section class="bg-white p-4 rounded shadow mb-6">
            <h2 class="text-2xl font-bold mb-4">Project Request: AI for Healthcare</h2>
            <div class="flex flex-col md:flex-row items-start">
                <div class="flex-1 mb-4">
                    <h3 class="font-semibold text-lg mb-2">Project Details</h3>
                    <p class="text-gray-600">A brief description of the project goes here. It should provide an overview in 2-3 sentences.</p>

                    <div class="flex items-center my-2">
                        <img src="uploader-avatar.jpg" alt="Uploader Avatar" class="h-10 w-10 rounded-full mr-3">
                        <div>
                            <p>John Doe</p>
                            <p class="text-sm text-gray-400">Submitted on 2023-10-05</p>
                        </div>
                    </div>

                    <div class="flex space-x-2 my-2">
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">#AI</span>
                        <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded">#Healthcare</span>
                    </div>
                </div>
                <div class="flex-1 md:ml-6">
                    <h3 class="font-semibold text-lg mb-2">Document Previews</h3>
                    <div class="flex space-x-2">
                        <!-- Example Thumbnail -->
                        <img src="document-thumbnail.png" alt="Document Thumbnail" class="w-12 h-16 bg-gray-100">
                    </div>
                </div>
            </div>
        </section>

        <!-- Accept/Reject Actions -->
        <section class="flex justify-center space-x-4 mb-6">
            <button id="acceptBtn" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                <span class="material-icons mr-2">check</span> Accept
            </button>
            <button id="rejectBtn" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded flex items-center">
                <span class="material-icons mr-2">close</span> Reject
            </button>
        </section>

        <!-- Modal for Rejection -->
        <div id="rejectionModal" class="fixed z-20 inset-0 overflow-y-auto hidden">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg">
                    <div class="bg-gray-50 px-4 py-3">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Confirm Rejection</h3>
                        <p class="mt-1 text-sm text-gray-500">Are you sure you want to reject this project? Please provide a reason.</p>
                    </div>
                    <div class="p-4">
                        <textarea id="rejectionReason" placeholder="Reason for rejection" class="w-full p-2 border border-gray-300 rounded"></textarea>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse">
                        <button id="confirmReject" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:w-auto sm:text-sm">
                            Reject
                        </button>
                        <button id="cancelReject" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Submission Details -->
        <section class="bg-white p-4 rounded shadow mb-6">
            <h3 class="font-semibold text-lg mb-2">Additional Details</h3>
            <p><strong>Project Deadline:</strong> 2023-11-01</p>
            <p><strong>Current Status:</strong> Under Review</p>
            <p><strong>Review History:</strong> This project has been reviewed by 3 other users.</p>
        </section>

        <!-- Related Projects Section -->
        <section class="bg-white p-4 rounded shadow">
            <h3 class="font-semibold text-lg mb-4">Related Projects</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Example Related Project Card -->
                <div class="bg-gray-100 p-4 rounded">
                    <h4 class="text-lg font-bold mb-2">Web Development for Beginners</h4>
                    <p class="text-gray-600 mb-2">An introduction to basic web development skills.</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Details</button>
                </div>
                <!-- Add more cards as needed -->
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white p-4 mt-6">
        <div class="container mx-auto flex justify-between">
            <div class="space-y-2">
                <a href="#" class="block">About Us</a>
                <a href="#" class="block">FAQ</a>
                <a href="#" class="block">Privacy Policy</a>
                <a href="#" class="block">Contact</a>
            </div>
            <div class="space-x-3">
                <!-- Example Social Media Icon -->
                <a href="#" class="text-gray-400 hover:text-white">Facebook</a>
                <a href="#" class="text-gray-400 hover:text-white">Twitter</a>
                <!-- Add more icons as needed -->
            </div>
        </div>
    </footer>

    <script>
        // JavaScript for handling Accept/Reject actions and modal dialog
        document.getElementById('acceptBtn').addEventListener('click', function() {
            this.textContent = 'Project Accepted';
            this.classList.remove('bg-green-500', 'hover:bg-green-600');
            this.classList.add('bg-green-700');
        });

        document.getElementById('rejectBtn').addEventListener('click', function() {
            document.getElementById('rejectionModal').style.display = 'block';
        });

        document.getElementById('cancelReject').addEventListener('click', function() {
            document.getElementById('rejectionModal').style.display = 'none';
        });

        document.getElementById('confirmReject').addEventListener('click', function() {
            const reason = document.getElementById('rejectionReason').value;
            if (reason.trim() !== "") {
                alert('Project Rejected with reason: ' + reason);
                document.getElementById('rejectionModal').style.display = 'none';
            } else {
                alert('Please provide a reason for rejection.');
            }
        });
        
        // Example of handling notifications: This could be expanded based on actual notification data structure
        function handleNotifications() {
          let notifications = JSON.parse(localStorage.getItem('notifications')) || [];
          // Display notifications dynamically
          notifications.forEach(notification => {
              // Logic to display notification
          });
        }

        // Initial setup for fetching notifications
        window.onload = () => {
           handleNotifications();
        }
    </script>

</body>
</html>
