<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <!-- Styles -->
        @vite('resources/css/app.css')

    </head>
    <body class="bg-[#FDFDFC] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            <nav class="flex items-end justify-end gap-4">
            <a
                href="{{ route('login') }}"
                class="inline-block px-6 py-2 text-indigo-600 border-2 border-indigo-600 rounded-md shadow-md hover:bg-indigo-600 hover:text-white transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            >
                Log in
            </a>
            </nav>
        
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow">
            <div class="">

                {{-- <img src="{{ asset('img/pizza-house.png') }}" alt=""> --}}
                <img src="{{ asset('img/pizza-house.png') }}" alt="">
                <div class="text-center mt-6 mb-3">
                    <h1 class="text-custom-purple text-5xl">The Best Pizzas in the Hood</h1>
                </div>
                <hr class="border-4 border-custom-purple rounded">
                <div class="text-center mt-6 mb-3">
                    <a href="{{ route('order-pizza') }}" class="text-custom-purple underline underline-offset-2">Link to Order</a>
                </div>
            </div>

        </div>
    </body>
</html>
