<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Vite compiled assets -->
    @vite('resources/css/app.css')
    
    <style>
        html, body {
            height: 100%;
        }

        .content-wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="content-wrapper">
        <div class="py-2 border border-slate-200 drop-shadow-sm">
            <nav class="container mx-auto">
                <ul class="flex justify-between space-x-5">
                    <li>
                        <a href="/" class="text-slate-500 no-underline text-xl">
                            Pizzahouse
                        </a>
                    </li>
        
                    <li>
                        @if(session()->has('loginEmail')) 
                            <!-- If session has 'loginEmail' (user is logged in) -->
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="text-slate-500 no-underline cursor-pointer">
                                    Logout
                                </button>
                            </form>
                        @else
                            <!-- If 'loginEmail' is not in session (user is not logged in) -->
                            <a href="{{ route('login') }}" class="text-slate-500 no-underline cursor-pointer">
                                Login
                            </a>
                        @endif
                    </li>
                </ul>
            </nav>
        </div>
    

        <div class="content flex-1">
            @yield('content') <!-- This will be replaced by child views' content -->
        </div>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 mt-8">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Pizzahouse. All rights reserved.</p>
                <p>
                    <a href="#" class="text-slate-300 hover:text-white">Privacy Policy</a> | 
                    <a href="#" class="text-slate-300 hover:text-white">Terms of Service</a>
                </p>
            </div>
        </footer>
    </div>

    <!-- (Include as CDN) jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('scripts')
    
</body>
</html>
