<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dotogether Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-custom-gradient {
            background: linear-gradient(135deg, #38b2ac, #4299e1);
        }
        .hover-scale {
            transition: transform 0.3s;
        }
        .hover-scale:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-100">

    
    <header class="bg-white py-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-6">
            <div class="text-2xl font-bold text-teal-600">Dotogether</div>
            <a href="/" class="text-gray-600 hover:text-teal-500">Go to Home</a>
        </div>
    </header>

   
        @if(session('message'))
        {{session('message')}}
        @endif
   
    <section class="flex flex-col md:flex-row h-screen justify-center items-center bg-custom-gradient">

        <div class="bg-white p-8 rounded-lg shadow-lg md:w-1/2 lg:w-1/3">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Sign Up</h2>
            <form id="signupForm" class="space-y-4" action="signup" method="post">
                @csrf
                <div>
                    <input type="text" name="fullName" placeholder="Enter your full name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                    @error('fullName'){{'⚠︎'.$message}}@enderror
                </div>
                <div>
                    <input type="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                    @error('email'){{'⚠︎'.$message}}@enderror
                </div>
                <div>
                    <input type="password" name="password" placeholder="Create a password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                    @error('password'){{'⚠︎'.$message}}@enderror
                </div>
                <div>
                    <input type="password" name="password_confirmation" placeholder="Re-enter your password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500">
                    @error('password_confirmation'){{'⚠︎'.$message}}@enderror

                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" class="mr-2">
                    <label for="terms" class="text-gray-600">I agree to the <a href="#" class="text-teal-500 hover:text-teal-700">Terms of Service</a> and <a href="#" class="text-teal-500 hover:text-teal-700">Privacy Policy</a>.</label>
                </div>
                @error('terms'){{'⚠︎'.$message}}@enderror
                <input type="submit" class="bg-purple-500  py-2 px-4 rounded-lg w-full hover:bg-teal-600 hover-scale" value="Sign Up">
            </form>


            <div class="mt-6 text-center">
                <p class="text-gray-600">Already have an account? <a href="login" class="text-teal-500 hover:text-teal-700">Log In</a></p>
            </div>
        </div>
    </section>


    <footer class="bg-white py-4 shadow-inner">
        <div class="container mx-auto flex justify-center space-x-6 text-gray-600">
            <a href="#" class="hover:text-teal-500">About</a>
            <a href="#" class="hover:text-teal-500">Contact</a>
            <a href="#" class="hover:text-teal-500">Help</a>
        </div>
    </footer>


</body>
</html>