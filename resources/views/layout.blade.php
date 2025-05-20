<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex items-center justify-between p-4">
        <!-- Logo Section -->
        <div class="flex items-center">
            <img src="logo.png" alt="Logo" class="h-8 mr-2">
            <span class="text-lg font-bold">All User Projects</span>
        </div>

        <!-- Hamburger Menu (Mobile) -->
        <div class="md:hidden">
            <button id="menuToggle" class="text-gray-800 focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Desktop Navigation Links -->
        <nav class="hidden md:flex space-x-6">
            <a href="/dashboard" class="text-gray-800 hover:text-blue-600">Home</a>
            <a href="/profile" class="text-gray-800 hover:text-blue-600">Profile</a>
            <a href="/addProject" class="text-gray-800 hover:text-blue-600">Add Project</a>
            <a href="/pending" class="text-gray-800 hover:text-blue-600">Pending Requests</a>
            <a href="/active" class="text-gray-800 hover:text-blue-600">Active Projects</a>
            <a href="/logout" class="text-gray-800 hover:text-blue-600">Logout</a>
        </nav>
    </div>

    <!-- Mobile Navigation Links -->
    <div id="mobileMenu" class="hidden md:hidden bg-white shadow-md">
        <a href="/dashboard" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Home</a>
        <a href="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profile</a>
        <a href="/addProject" class="text-gray-800 hover:text-blue-600">Add Project</a>
        <a href="/pending" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Pending Requests</a>
        <a href="/active" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Active Projects</a>
        <a href="/logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Logout</a>
    </div>
</header>

@section('dashboard')
@show
@section('profile')
@show
@section('addproject')
@show
@section('pendingrequest')
@show
@section('active_project')
@show
@section('project_detail')
@show
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
                    <a href="#" class="text-gray-700 hover:text-blue-500">Facebook</a>
                    <a href="#" class="ml-4 text-gray-700 hover:text-blue-500">Twitter</a>
                    <a href="#" class="ml-4 text-gray-700 hover:text-blue-500">LinkedIn</a>
                </div>
            </div>
        </div>
    </footer>