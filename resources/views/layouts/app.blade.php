<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Fitness Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('images/workout.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/workout.png') }}" type="image/png" sizes="114x114">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ asset('js/modal.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>



    <style>
        #offCanvasMenu {
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
        }

        #offCanvasMenu.show {
            transform: translateX(0);
        }

        .hidden {
            display: none;
        }

        .block {
            display: block;
        }
    </style>
</head>

<body class="h-full bg-neutral-200">

    <div>
        <!-- Button to Open the Menu -->
        {{-- <button id="menuButton" class="m-4 p-2 bg-indigo-600 text-white rounded-md">
            Open Menu
        </button> --}}

        <!-- Off-Canvas Menu -->
        <div id="offCanvasMenu" class="fixed inset-0 z-50 lg:hidden bg-gray-900/80">
            <div class="fixed inset-0 flex">
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button id="closeMenuButton" type="button" class="-m-2.5 p-2.5">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-gray-900 px-6 pb-4 ring-1 ring-white/10">
                        <div class="flex h-16 shrink-0 items-center">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>
                        <nav class="flex flex-1 flex-col">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <x-admin-nav-link href="{{ url('/dashboard') }}" :active="request()->is('dashboard')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                        </x-slot:icon>
                                        Home
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/members') }}" :active="request()->is('admin/members')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Member
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/programs') }}" :active="request()->is('admin/programs')">
                                        <x-slot:icon>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100"
                                                height="100">

                                                <path d="M10 45 H90" stroke="black" fill="none" stroke-width="4" />

                                                <circle cx="20" cy="45" r="8" stroke="black"
                                                    fill="none" stroke-width="4" />

                                                <circle cx="80" cy="45" r="8" stroke="black"
                                                    fill="none" stroke-width="4" />

                                                <path d="M40 35 V55" stroke="black" fill="none" stroke-width="4" />
                                            </svg>

                                        </x-slot:icon>
                                        Programs
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/exercises') }}" :active="request()->is('admin/exercises')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Exercises
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/payments') }}" :active="request()->is('admin/payments')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Payments
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/tutorials') }}" :active="request()->is('admin/tutorials')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Tutorials
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/feedback') }}" :active="request()->is('admin/feedback')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Feedback
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/report') }}" :active="request()->is('admin/report')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Report
                                    </x-admin-nav-link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Static sidebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex grow flex-col gap-y-5 overflow-y-auto bg-neutral-800 pr-6 pb-12">
                <div class="flex h-16 shrink-0 items-center">
                    <a href="/profile" class="group block shrink-0 mt-12">
                        <div class="flex items-center">
                            <div class="p-4">
                                <img class="inline-block size-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </div>
                            <div class="">
                                <p class="text-sm font-large text-gray-100 group-hover:text-gray-600">
                                    {{Auth::user()->name}}</p>
                                <p class="text-xs font-medium text-gray-500 group-hover:text-gray-600">
                                    {{Auth::user()->role}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <nav class="flex flex-1 flex-col">
                    <ul role="list" class="flex flex-1 flex-col gap-y-7">
                        <li>
                            <ul role="list" class="-mx-2 space-y-1">
                                <li class="py-2 px-8 mt-4">
                                    <p class="text-sm font-medium text-gray-400 group-hover:text-gray-900 tracking-wide leading-relaxed">navigation
                                    </p>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/dashboard') }}" :active="request()->is('dashboard')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                        </x-slot:icon>
                                        Home
                                    </x-admin-nav-link>

                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/members') }}" :active="request()->is('admin/members')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Member
                                        </x-admin-navx-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/programs') }}" :active="request()->is('admin/programs')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Programs
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/exercises') }}" :active="request()->is('admin/exercises')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Exercises
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/payments') }}" :active="request()->is('admin/payment')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Payments
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/tutorials') }}" :active="request()->is('admin/tutorials')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Tutorials
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/feedbacks') }}" :active="request()->is('admin/feedbacks')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Feedback
                                    </x-admin-nav-link>
                                </li>
                                <li>
                                    <x-admin-nav-link href="{{ url('/admin/users') }}" :active="request()->is('admin/users')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6 shrink-0" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                                data-slot="icon">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Users
                                    </x-admin-nav-link>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    {{-- <form method="POST" action="/logout" class="inline-block text-center mx-auto">
                        @csrf
                        <button type="submit"
                            class="flex items-center bg-gray-50 text-slate-950 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form> --}}

                </nav>
            </div>
        </div>

        <div class="lg:pl-72">
            <div
                class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 bg-neutral-900 text-white px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                <button id="menuButton" type="button" class="-m-2.5 p-2.5 text-gray-200 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Separator -->
                <div class="h-6 w-px bg-white
                 lg:hidden" aria-hidden="true"></div>

                <div class="flex flex-1 justify-end gap-x-4 lg:gap-x-6 p-4 bg-white-800">
                    <div class="relative inline-block text-left">
                        <div x-data="{ dropdownOpen: false }">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-lg hover:rouned-4xl p-2 rouned-lg hover:bg-red-700"
                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                @click="dropdownOpen = !dropdownOpen">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="white" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 9-7 7-7-7" />
                                </svg>


                            </button>

                            <!-- Dropdown menu, show/hide based on dropdownOpen state -->
                            <div x-show="dropdownOpen" x-cloak
                                class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                tabindex="-1" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95">
                                <div
                                    class="flex items-center w-full text-slate-950 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-150 ease-in-out">
                                    <a href="/profile">Profile</a>
                                </div>
                                <div class="py-1 w-full" role="none">
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button type="submit"
                                            class="flex items-center w-full text-slate-950 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-150 ease-in-out">
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Notification Button -->
                    {{-- <button type="button" class="-m-2.5 p-2.5 flex flex-row text-red-700 hover:text-red-600">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="red" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                          </svg>                          
                    </button> --}}
                </div>

            </div>

            <main class="py-10">
                <div class="px-2 sm:px-4 lg:px-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
        const menuButton = document.getElementById('menuButton');
        const closeMenuButton = document.getElementById('closeMenuButton');
        const offCanvasMenu = document.getElementById('offCanvasMenu');

        menuButton.addEventListener('click', () => {
            offCanvasMenu.classList.add('show');
        });

        closeMenuButton.addEventListener('click', () => {
            offCanvasMenu.classList.remove('show');
        });

        // Close the menu when clicking outside of it
        window.addEventListener('click', (event) => {
            if (!offCanvasMenu.contains(event.target) && !menuButton.contains(event.target)) {
                offCanvasMenu.classList.remove('show');
            }
        });
    </script>

</body>

</html>
