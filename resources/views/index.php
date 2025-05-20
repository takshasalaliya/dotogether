<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dotogether</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50 font-sans m-0 p-0">
     @php
   
    $image=public_path('logo.png');
    @endphp
    <header class="bg-white shadow p-4 flex items-center justify-between">
        <img src="{{'data:image/png;base64,'.base64_encode(file_get_contents($image))}}" alt="Dotogether Logo" class="h-10">
        <nav>
            <ul class="flex space-x-4">
                <li><a href="#" class="text-gray-700 hover:text-green-500">Home</a></li>
                <li><a href="#" class="text-gray-700 hover:text-green-500">Features</a></li>
                <li><a href="#" class="text-gray-700 hover:text-green-500">About</a></li>
                <li><a href="#" class="text-gray-700 hover:text-green-500">Contact</a></li>
            </ul>
        </nav>
    </header>

   
    <section class="bg-gradient-to-r from-green-500 to-blue-400 text-center p-10 text-white relative overflow-hidden">
        <div class="absolute inset-0 grid grid-cols-12 opacity-20">
            <div class="col-span-2 bg-white"></div>
            <div class="col-span-8 bg-gray-50"></div>
            <div class="col-span-2 bg-white"></div>
        </div>
        <h1 class="text-5xl font-extrabold relative">Collaborate, Share, Innovate—Together!</h1>
        <p class="mt-4 text-lg relative">Upload and showcase your projects effortlessly. Share knowledge, inspire others, and collaborate on ideas—all in one place.</p>
        <div class="mt-6 space-x-4 relative">
           <a href="signup"> <button class="bg-purple-500 px-6 py-3 rounded-full shadow-md hover:bg-purple-600">Get Started</button></a>
            <a href="signup"><button class="border border-purple-500 text-purple-500 px-6 py-3 rounded-full hover:bg-purple-100">Learn More</button></a>
        </div>
    </section>

   
    <section class="p-8 bg-white">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-green-100 to-blue-100 p-6 rounded shadow-lg">
                <h3 class="text-xl font-bold mb-2">Upload and Manage Projects</h3>
                <p>Drag-and-drop or browse to upload files like PDFs, Word documents, or images.</p>
            </div>
            <div class="bg-gradient-to-r from-green-100 to-blue-100 p-6 rounded shadow-lg">
                <h3 class="text-xl font-bold mb-2">Collaborate and Share</h3>
                <p>Engage with the community, comment, and share projects.</p>
            </div>
            <div class="bg-gradient-to-r from-green-100 to-blue-100 p-6 rounded shadow-lg">
                <h3 class="text-xl font-bold mb-2">Discover and Learn</h3>
                <p>Explore innovative projects and gain inspiration for your own.</p>
            </div>
        </div>
    </section>

    
    <section class="bg-gray-100 p-8">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold mb-4">Testimonials & Community Impact</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            </div>
        </div>
    </section>


    <section class="bg-teal-200 text-gray-800 p-8 text-center">
        <h2 class="text-2xl font-bold">Join the Dotogether Community Today!</h2>
        <p class="mt-2">Sign up and start sharing your projects with a community of innovators.</p>
        <a href="signup"><button class="bg-white text-teal-500 px-6 py-3 mt-4 rounded-full hover:bg-gray-300">Sign Up Now</button></a>
    </section>

  
    <footer class="bg-gray-800 text-white py-4">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-4 text-center md:text-left">
            <div><a href="#" class="hover:underline">About Us</a></div>
            <div><a href="#" class="hover:underline">Contact</a></div>
            <div><a href="#" class="hover:underline">Privacy Policy</a></div>
            <div><a href="#" class="hover:underline">Terms of Service</a></div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="inline-block mx-2">Facebook</a>
            <a href="#" class="inline-block mx-2">Twitter</a>
            <a href="#" class="inline-block mx-2">LinkedIn</a>
        </div>
        <div class="text-center mt-4">
            <form>
                <label for="newsletter" class="text-sm">Subscribe to stay updated</label>
                <input type="email" id="newsletter" name="newsletter" placeholder="Enter your email" class="border rounded py-1 px-2 text-gray-800">
                <button class="bg-green-500 text-white py-1 px-3 rounded">Subscribe</button>
            </form>
        </div>
    </footer>
</body>
</html>