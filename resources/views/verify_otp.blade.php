<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification - Dotogether</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.3/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col items-center min-h-screen justify-between">
    
    <header class="bg-white shadow w-full p-4 text-center fixed top-0">
        <h1 class="text-teal-600 text-3xl font-bold">Dotogether</h1>
        <p class="text-gray-700 mt-2">Enter the 6-digit OTP sent to your registered email.</p>
        <p class="text-gray-500">OTP sent {{$email}} ****@example.com</p>
    </header>

    @if(session('message'))
        {{session('message')}}
    @endif

    <main class="mt-24 flex-grow flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-8 max-w-lg w-full">
            <form action="{{'otp_verify/'.$id}}" method="get">
                @csrf
                <div class="flex justify-center items-center space-x-2 mb-6">
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                    <input type="text" maxLength="1" class="otp-input w-12 h-12 text-2xl text-center border rounded-md focus:outline-none focus:border-teal-500" name="otp[]"/>
                </div>

                <div class="flex flex-col items-center">
                    <input type="submit" id="verify-btn" class="bg-purple-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded mt-2 disabled:opacity-50" name="Verify OTP">
                </div>
            </form>
        </div>
    </main>

    <footer class="bg-white w-full p-4 text-center shadow-t">
        <a href="#" class="text-gray-600 hover:text-gray-800">Privacy Policy</a> |
        <a href="#" class="text-gray-600 hover:text-gray-800">Terms of Use</a> |
        <a href="#" class="text-gray-600 hover:text-gray-800">Contact Support</a>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const inputs = document.querySelectorAll(".otp-input");
            
            inputs.forEach((input, index) => {
                input.addEventListener("input", (e) => {
                    if (e.inputType !== "deleteContentBackward" && input.value.length === 1) {
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        }
                    }
                });
                
                input.addEventListener("keydown", (e) => {
                    if (e.key === "Backspace" && input.value === "") {
                        if (index > 0) {
                            inputs[index - 1].focus();
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>