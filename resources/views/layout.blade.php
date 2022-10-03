<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Font Awesome CDN fron cdnjs.com --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Alpine JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Tailwind CSS CDN from tailwindcss.com--}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Tailwind Color Customization --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        customGreen: '#ABD699',
                        customYellow: '#FFE26A',
                        customBlue: '#75C9B7',
                        customGray: '#C7DDCC',
                        customDarkBlue: '#16123F'
                    },
                    fontWeight: {
                        superBold: 2000
                    }
                },
            },
        };
    </script>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <title>LaraTask | @yield('title')</title>
</head>
<body>
    {{-- Container --}}
    <div class="flex flex-col min-h-screen w-full px-4 md:w-3/4 md:mx-auto md:p-0">

        {{-- Navigation --}}
        <nav class="flex justify-between items-center pt-6 md:flex-row  md:h-24 md:pt-0">
            
            {{-- Logo --}}
            <a href="/">
                <img class="w-40" src="{{ asset('images/logo.png') }}" alt="logo">
            </a>

            {{-- Links for Large Screen --}}
            <ul class="hidden md:flex space-x-6">
                @auth
                    {{-- Name --}}
                    <li>
                        <p class="capitalize text-white">Hi, {{ auth()->user()->name }}!</p>
                    </li>

                    {{-- My Tasks --}}
                    <li>
                        <a href="/tasks" class="duration-150 text-white hover:text-customDarkBlue hover:ease-in">My Tasks</a>
                    </li>

                    {{-- Logout --}}
                    <li>
                        <form action="/logout" method="POST">
                            @csrf

                            <button type="submit" class="duration-150 text-white hover:text-customDarkBlue hover:ease-in">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    {{-- Sign In --}}
                    <li>
                        <a href="/login" class="duration-150 text-white hover:text-customDarkBlue hover:ease-in">Sign In</a>
                    </li>

                    {{-- Create An Account --}}
                    <li>
                        <a href="/register" class="duration-150 border-0 border-white rounded-md bg-white text-customBlue px-2 py-1 hover:bg-customDarkBlue hover:text-white hover:ease-in">Create an Account</a>
                    </li>
                @endauth
                
            </ul>

            <!-- Menu Button for Mobile -->
            <button id="menu-btn" class="block menu-btn md:hidden focus:outline-none">
                <span class="menu-top"></span>
                <span class="menu-middle"></span>
                <span class="menu-bottom"></span>
            </button>
        </nav>

        <!-- Links for Mobile -->
        <div class="md:hidden">
            <div id="menu" class="hidden absolute flex-col items-center rounded-md py-6 mt-6 space-y-6 bg-white left-4 right-4 drop-shadow-xl sm:w-auto sm:self-center">
                @auth
                    {{-- My Tasks --}}
                    <a href="/tasks" class="text-customDarkBlue hover:font-bold">My Tasks</a>
                    
                    {{-- Logout --}}
                    <form action="/logout" method="POST">
                        @csrf

                        <button type="submit" class="text-customDarkBlue hover:font-bold">
                            Logout
                        </button>
                    </form>
                @else
                    {{-- Sign In --}}
                    <a href="/login" class="text-customDarkBlue hover:font-bold">Sign In</a>

                    {{-- Create An Account --}}
                    <a href="/register" class="text-customDarkBlue hover:font-bold">Create an Account</a>
                @endauth   
            </div>
        </div>

        {{-- Main --}}
        <section class="py-9 mt-4 grow md:pt-4 md:mt-0 lg:px-10">
            @yield('content')
        </section>

        {{-- Footer --}}
        <footer class="text-center text-customDarkBlue font-bold pt-6 pb-12 mt-auto">
            <p class="text-sm">by Paulo Amielle | <span class="font-serif">K R A U</span> &copy; 2022</p>
            {{-- <p class="text-xs">Made with Laravel</p> --}}
        </footer>
    </div>

    {{-- Message --}}
    <x-message />

    <!-- JS for Menu Button -->
    <script src="{{ asset('js/menu.js') }}"></script>
</body>
</html>