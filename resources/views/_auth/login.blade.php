<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>
<body>
    <div class="container mx-auto h-screen flex justify-center items-center">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="bg-white p-8 rounded-lg border border-gray-300 shadow-lg lg:w-[400px] md:w-full">


                <h3 class="text-center text-2xl font-semibold mb-4">Sign In</h3>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium">Email:</label>
                    <input type="text" name="email" id="email" class="w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password:</label>
                    <input type="password" name="password" id="password" class="w-full px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <!-- Display session messages (success, error, etc.) -->
                @if (session('message'))
                    <p class="text-green-500 text-sm"><i>{{ session('message') }}</i></p>
                @endif

                <!-- Display centralized error message -->
                @if ($errors->has('message'))
                    <p class="text-red-500 text-sm"><i>{{ $errors->first('message') }}</i></p>
                @endif

                <div class="flex justify-center items-center mt-4">
                    <a href="{{ route('landingPage') }}" class="text-custom-purple underline underline-offset-2 mx-2">Return to Home</a>
                    <input type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="Login">
                </div>


            </div>
        </form>
    </div>
</body>
</html>


