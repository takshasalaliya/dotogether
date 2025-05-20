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
    <header class="bg-white shadow-md fixed w-full top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <img class="h-8 w-auto" src="logo.png" alt="Dotogether Logo">
                </div>
                <div class="flex flex-1 justify-center lg:justify-start">
                    <input type="text" placeholder="Search projects" class="w-full lg:w-64 p-2 border rounded">
                </div>
                <div class="relative">
                    <button class="flex items-center text-gray-700">
                        <img class="h-8 w-8 rounded-full" src="avatar.png" alt="User Avatar">
                        <span class="ml-2 hidden lg:inline">Dropdown ▼</span>
                    </button>
                    <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg py-1 hidden">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">My Dashboard</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Profile Content -->
    <main class="mt-16 flex justify-center">
        <div class="max-w-4xl w-full p-4">
            <!-- User Profile Section -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center">
                    <img class="h-20 w-20 rounded-full" src="profile_picture.png" alt="Profile Picture">
                    <div class="ml-4">
                        <h2 class="text-xl font-bold">User Name</h2>
                        <p class="text-sm text-gray-500">Location</p>
                        <p class="text-sm text-gray-500">Age: 28</p>
                        <p class="text-sm text-gray-500">"Passionate Web Developer"</p>
                        <p class="text-sm text-gray-500">Joined January 2023</p>
                        <button class="mt-3 bg-green-500 text-white px-4 py-2 rounded">Follow</button>
                    </div>
                </div>
            </section>

            <!-- Personal Information -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-bold mb-3">Personal Information</h3>
                <div class="space-y-2">
                    <div>
                        <span class="block text-sm font-bold">Skills:</span>
                        <div class="flex space-x-2 overflow-x-auto">
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded">#JavaScript</span>
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded">#Python</span>
                            <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded">#WebDev</span>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600">Total Projects: 10</p>
                    <!-- Social Media Links -->
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-700 hover:text-blue-500">GitHub</a>
                        <a href="#" class="text-gray-700 hover:text-blue-500">LinkedIn</a>
                        <a href="#" class="text-gray-700 hover:text-blue-500">Website</a>
                    </div>
                    <!-- Contact -->
                    <p><strong>Email:</strong> public_email@example.com</p>
                </div>
            </section>

            <!-- Projects Section -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-bold mb-3">Uploaded Projects</h3>
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded shadow-md hover:shadow-lg transform hover:scale-105 transition">
                        <h4 class="font-bold text-lg">Project Title</h4>
                        <p class="text-sm text-gray-600 mt-2">Project description goes here...</p>
                        <div class="mt-4">
                            <span class="bg-gray-200 p-1 text-sm rounded">#AI</span>
                        </div>
                        <div class="mt-4 text-sm text-blue-600">View Details</div>
                    </div>
                    <!-- More project cards can be added similarly -->
                </div>
            </section>

            <!-- Community Engagement Section -->
            <section class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-bold mb-3">Community Engagement</h3>
                <div>
                    <p class="text-sm text-gray-600">Top Reviews</p>
                    <!-- Add top review details here -->
                    <p class="text-sm text-gray-600">Recent Activity</p>
                    <!-- Add recent activity details here -->
                    <p class="text-sm text-gray-600">Leaderboard: Ranked #10 in AI Projects</p>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t">
        <div class="max-w-7xl mx-auto px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-500">About Us</a>
                    <span class="mx-2 text-gray-500">|</span>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-500">FAQ</a>
                    <span class="mx-2 text-gray-500">|</span>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-500">Privacy Policy</a>
                    <span class="mx-2 text-gray-500">|</span>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-500">Contact</a>
                </div>
                <div>
                    <a href="#" class="text-gray-700 hover:text-blue-500">Community: 10,000+ users, 50,000+ projects shared!</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            // Dropdown logic
            $(".relative button").on('click', function() {
                $(this).next().toggle();
            });

            // Follow button toggling
            $(".bg-green-500").on('click', function() {
                let buttonText = $(this).text();
                if (buttonText.trim() == "Follow") {
                    $(this).text("Following").addClass("bg-green-600");
                } else {
                    $(this).text("Follow").removeClass("bg-green-600");
                }
            });

            // Placeholder for project view details
            $(".text-blue-600").on('click', function() {
                alert("View project details functionality here.");
            });
        });
    </script>

</body>
</html>