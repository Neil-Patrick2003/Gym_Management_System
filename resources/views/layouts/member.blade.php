<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Fitnes Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('images/workout.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/workout.png') }}" type="image/png" sizes="114x114">


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

<body class="h-full bg-white">

    <div>
        <!-- Off-Canvas Menu -->
        <div id="offCanvasMenu" class="fixed inset-0 z-50 lg:hidden backdrop-blur-xl bg-white/30">
            <div class="fixed inset-0 flex">
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                        <button id="closeMenuButton" type="button" class="-m-2.5 p-2.5 bg-gray-200">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div
                        class="flex grow flex-col gap-y-5 overflow-y-auto  px-6 pb-4 ring-1 ring-white/10 border border-solid">
                        <div class="flex h-16 shrink-0 items-center">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>

                        <nav class="flex flex-1 flex-col ">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <x-member-nav-link href="{{ url('/home') }}" :active="request()->is('home')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />

                                            </svg>
                                        </x-slot:icon>
                                        Home
                                    </x-member-nav-link>
                                </li>
                                <li>
                                    <x-member-nav-link href="{{ url('/member/programs') }}" :active="request()->is('member/programs')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Programs
                                    </x-member-nav-link>
                                </li>
                                <li>
                                    <x-member-nav-link href="{{ url('/member/myprogram') }}" :active="request()->is('member/myprogram')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        My Progress
                                    </x-member-nav-link>
                                </li>
                                <li>
                                    <x-member-nav-link href="{{ url('/member/appointments') }}" :active="request()->is('member/appoinments')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Appointment
                                    </x-member-nav-link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
            <div class="flex grow flex-col overflow-y-auto">
                <div class="h-full p-6 bg-red-600">
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="-mx-2 space-y-1 ">
                                    <li class="pt-6">
                                        <x-member-nav-link href="{{ url('/home') }}" :active="request()->is('home')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                                </svg>
                                            </x-slot:icon>
                                            Home
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/programs') }}" :active="request()->is('member/programs')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Programs
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/myprogram') }}" :active="request()->is('member/myprogram')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            My Progress
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/appointments') }}" :active="request()->is('member/appoinments')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Appointment
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/recommendations') }}" :active="request()->is('member/recommendations')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            recommendations
                                        </x-member-nav-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <form method="POST" action="/logout" class="inline-block text-center mx-auto">
                        @csrf
                        <button type="submit"
                            class="flex items-center bg-gray-50 text-slate-950 px-4 py-2 rounded-md hover:bg-gray-200 transition duration-150 ease-in-out">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:pl-72 bg-white">
            <div class="lg:pl-72 bg-white">
                <div class="sticky top-0 z-40 flex h-14 shrink-0 items-center gap-x-4 px-4 shadow-sm sm:px-6 lg:px-8">
                    <button id="menuButton" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div class="flex flex-1 justify-center sm:justify-start">
                        <input type="text" placeholder="Search..."
                            class="w-full h-8 px-4 py-2 border-2 border-red-600 bg-transparent text-gray-700 placeholder-gray-500 rounded-full focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-300">
                    </div>
                    <div class="flex flex-1 justify-end gap-x-4 lg:gap-x-6 p-4">
                        <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <main class="">
                <div class="px-2 sm:px-4 lg:px-4 bg-white">
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

        window.addEventListener('click', (event) => {
            if (!offCanvasMenu.contains(event.target) && !menuButton.contains(event.target)) {
                offCanvasMenu.classList.remove('show');
            }
        });
    </script>

</body>

</html>