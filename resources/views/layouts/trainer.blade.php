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
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


    <script src="{{ asset('js/modal.js') }}"></script>
{{--    @vite('resources/js/filters.js')--}}



    @vite('resources/js/app.js')

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

        [x-cloak] {
            display: none !important
        }
    </style>
</head>

<body class="h-full">

    <div>
        <!-- Off-Canvas Menu -->
        <div id="offCanvasMenu" class="fixed inset-0 z-50 lg:hidden backdrop-blur-xl bg-white/30">
            <div class="fixed inset-0 flex">
                <div class="relative mr-16 flex w-full max-w-xs flex-1">
                    <div class="absolute left-full top-0 flex w-8 justify-center pt-5">
                        <button id="closeMenuButton" type="button" class="bg-white">
                            <span class="sr-only">Close sidebar</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>

                    <div class="flex text-white grow flex-col gap-y-5 overflow-y-auto pb-4 ring-1  bg-red-700">
                        <div class="flex h-16 shrink-0 items-center">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>

                        <nav class="flex flex-1 flex-col ">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7">
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/home') }}" :active="request()->is('trainer/home')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />

                                            </svg>
                                        </x-slot:icon>
                                        Home
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/programs') }}" :active="request()->is('trainer/programs')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Programs
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/exercises') }}" :active="request()->is('trainer/exercises')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Exercises
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/appointments') }}" :active="request()->is('trainer/appointments')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Appointments
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/tutorials') }}" :active="request()->is('trainer/tutorials')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Tutorials
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/recommendations') }}" :active="request()->is('member/appoinments')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Recommendations
                                    </x-trainer-nav-link>
                                </li>
                                <li>
                                    <x-trainer-nav-link href="{{ url('/trainer/recommendations') }}" :active="request()->is('member/appoinments')">
                                        <x-slot:icon>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                            </svg>
                                        </x-slot:icon>
                                        Tutorials
                                    </x-trainer-nav-link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!--idebar for desktop -->
        <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col  bg-red-500">
            <!-- Sidebar component, home, projects, exercises ....-->
            <div class="flex grow flex-col overflow-y-auto pb-4">

                <div class="pt-16 h-full ">
                    <nav class="flex flex-1 flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-7">
                            <li>
                                <ul role="list" class="pl-4 space-y-1">
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/home') }}" :active="request()->is('trainer/home')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />

                                                </svg>
                                            </x-slot:icon>
                                            Home
                                        </x-trainer-nav-link>
                                    </li>
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/programs') }}" :active="request()->is('trainer/programs')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 3v18m12-18v18m-6-3H6m12 0h-6" />
                                                </svg>

                                            </x-slot:icon>
                                            Programs
                                        </x-trainer-nav-link>
                                    </li>
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/exercises') }}" :active="request()->is('trainer/exercises')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Exercises
                                        </x-trainer-nav-link>
                                    </li>
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/appointments') }}"
                                            :active="request()->is('trainer/appointments')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M4 9.05H3v2h1v-2Zm16 2h1v-2h-1v2ZM10 14a1 1 0 1 0 0 2v-2Zm4 2a1 1 0 1 0 0-2v2Zm-3 1a1 1 0 1 0 2 0h-2Zm2-4a1 1 0 1 0-2 0h2Zm-2-5.95a1 1 0 1 0 2 0h-2Zm2-3a1 1 0 1 0-2 0h2Zm-7 3a1 1 0 0 0 2 0H6Zm2-3a1 1 0 1 0-2 0h2Zm8 3a1 1 0 1 0 2 0h-2Zm2-3a1 1 0 1 0-2 0h2Zm-13 3h14v-2H5v2Zm14 0v12h2v-12h-2Zm0 12H5v2h14v-2Zm-14 0v-12H3v12h2Zm0 0H3a2 2 0 0 0 2 2v-2Zm14 0v2a2 2 0 0 0 2-2h-2Zm0-12h2a2 2 0 0 0-2-2v2Zm-14-2a2 2 0 0 0-2 2h2v-2Zm-1 6h16v-2H4v2ZM10 16h4v-2h-4v2Zm3 1v-4h-2v4h2Zm0-9.95v-3h-2v3h2Zm-5 0v-3H6v3h2Zm10 0v-3h-2v3h2Z" />
                                                </svg>

                                            </x-slot:icon>
                                            Appointments
                                        </x-trainer-nav-link>
                                    </li>
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/tutorials') }}" :active="request()->is('trainer/tutorials')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M19 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z" />
                                                </svg>

                                            </x-slot:icon>
                                            Tutorials
                                        </x-trainer-nav-link>
                                    </li>
                                    <li>
                                        <x-trainer-nav-link href="{{ url('/trainer/recommendations') }}"
                                            :active="request()->is('trainer/recommendations')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
                                                </svg>

                                            </x-slot:icon>
                                            Recommendations
                                        </x-trainer-nav-link>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>

        <div class="lg:pl-72 ">
            <div
                class="sticky  top-0 z-40 flex bg-blue h-12 shrink-0 items-center gap-x-4 px-4 shadow-sm sm:px-6 lg:px-8">
                <button id="menuButton" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                <!-- Separator -->
                <div class="h-6 w-px lg:hidden" aria-hidden="true"></div>

                <div class="flex flex-1 justify-end gap-x-4 lg:gap-x-6 p-4">
                    <div class="relative inline-block text-left">
                        <div x-data="{ dropdownOpen: false }">
                            <button type="button"
                                class="inline-flex w-full justify-center rounded-lg hover:rouned-4xl p-2 rouned-lg hover:text-red-700 "
                                id="menu-button" aria-expanded="true" aria-haspopup="true"
                                @click="dropdownOpen = !dropdownOpen">
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-[20px] h-[20px] text-zinc-800 pt-2 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="black" stroke-linecap="round" stroke-linejoin="round"
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


                </div>

            </div>

            <main class="">
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
