<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitnes Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.1/aos.css" />

    <link rel="shortcut icon" href="{{ asset('images/workout.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/workout.png') }}" type="image/png" sizes="114x114">
    <style>
        /* Custom background image for main content */
        .main-bg {
            background-image: url("images/bg.png");
            background-size: cover;
            background-position: center;
            min-height: 100vh;
        }

        /* Ensure full height for the html and body */
        html,
        body {
            height: 100%;
            margin: 0;
            scroll-behavior: smooth;
        }

        .gallery {
            height: 100%;
        }

        transition: transform 0.3s ease,
        box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Fade-in effect */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            /* Add shadow for better visibility */
        }

        .social-card {
            border: 0.5px solid white;
            /* Smaller white border */
            border-radius: 8px;
            /* Rounded corners */
            padding: 8px;
            /* Adjusted padding inside the card */
            transition: background-color 0.3s;
            /* Transition for hover effect */
        }

        .social-card:hover {
            background-color: rgba(255, 255, 255, 0.1);
            /* Light hover effect */
        }

        /* Footer styling */
        .footer {
            background-color: red;
            /* Red background */
            color: white;
            /* White text */
            text-align: center;
            /* Center the text */
            padding: 20px;
            /* Add padding */
            position: relative;
            /* Position the footer */
            width: 100%;
            /* Full width */
        }

        .contact {
            height: 100%;
        }
    </style>
</head>

<body>
    <div>
        <nav
            class="block w-full px-4 py-2 text-white bg-white shadow-md lg:px-8 lg:py-3 mt-0 fixed top-0 left-0 right-0 z-50">
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
                        <x-nav-link href="{{ url('/calculator') }}" :active="request()->is('calculator')">
                            Calculator
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
    </div>




    <div class="main">
        {{ $slot }}
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll('.fade-in');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            elements.forEach(element => {
                observer.observe(element);
            });
        });

        AOS.init();
    </script>



</body>

</html>
