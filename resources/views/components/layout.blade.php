<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom background image for main content */
        .main-bg {
            background-image: url("images/bg.png");


            /* Adjust the path according to your folder structure */
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            /* Ensure it covers the full height */
        }

        /* Ensure full height for the html and body */
        html,
        body {
            height: 100%;
            margin: 0;
            /* Remove default margin */
            overflow: hidden;
            /* Prevent scrolling */
        }
    </style>
</head>

<body>
    <nav class="block w-full px-4 py-2 text-white bg-white shadow-md lg:px-8 lg:py-3 mt-2">
        <div class="container flex flex-wrap items-center justify-between mx-auto text-slate-800">
            <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base font-semibold">
                <span class="text-black">Fitness</span><span class="text-red-600">Hub</span>
            </a>
            <div class="hidden lg:block">
                <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                    <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">
                        Home
                    </x-nav-link>
                    <x-nav-link href="{{ url('/about') }}" :active="request()->is('about')">
                        About Us
                    </x-nav-link>
                    <x-nav-link href="{{ url('/gallery') }}" :active="request()->is('gallery')">
                        Gallery
                    </x-nav-link>
                    <x-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">
                        Contact Us
                    </x-nav-link>
                </ul>
            </div>
            <button
                class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
        </div>
    </nav>

    <div class="main-bg flex items-center justify-center">
        <div class="text-center text-white p-8">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
