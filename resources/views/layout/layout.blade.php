<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50 h-screen">
<div class="min-h-full text-white" style="background-color: rgb(17 24 39 / var(--tw-bg-opacity))">
    <nav class="bg-gray-800">
        <div class="container mx-auto">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="hidden md:block">
                        <div class="flex items-baseline space-x-4">
                            <a href="{{route('home')}}"
                               class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                               aria-current="page">Home</a>
                            @if(auth()->user() && auth()->user()->type == 1)
                                <a href="{{route('benches')}}"
                                   class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                   aria-current="page">Benches</a>
                                <a href="{{route('order')}}"
                                   class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                   aria-current="page">Orders</a>
                                <a href="{{route('customer_work_schedule')}}"
                                   class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                   aria-current="page">Work Schedule</a>
                            @endif

                            @if(auth()->user() && auth()->user()->type == 2)
                                <a href="{{route('work_schedule')}}"
                                   class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                   aria-current="page">Work Schedule</a>

                                <a href="{{route('profile')}}"
                                   class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                                   aria-current="page">Skills</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="hidden md:block">
                    @auth
                        <a href="{{route('logout')}}">Logout</a>
                    @else
                        <a href="{{route('login')}}">Login</a> / <a href="{{route('register')}}">Register</a>
                    @endif
                </div>

                <div class="-mr-2 flex md:hidden">
                    <!-- Mobile menu button -->
                    <button type="button"
                            class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!-- Menu open: "hidden", Menu closed: "block" -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <!-- Menu open: "block", Menu closed: "hidden" -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <a href="{{route('home')}}" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                   aria-current="page">Home</a>
            </div>

            <div class="border-t border-gray-700 pb-3 pt-4">
                @auth
                    <a href="{{route('logout')}}">Logout</a>
                @else
                    <a href="{{route('login')}}">Login</a> / <a href="{{route('register')}}">Register</a>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')
</div>
</body>
</html>
