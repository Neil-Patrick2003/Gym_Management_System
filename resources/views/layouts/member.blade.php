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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>


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
                        class="flex grow flex-col gap-y-5 overflow-y-auto px-6 pb-4 ring-1 ring-white/10 border border-solid">
                        <div class="flex h-16 shrink-0 items-center">
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company">
                        </div>

                        <nav class="flex flex-1 flex-col py-4">
                            <ul role="list" class="flex flex-1 flex-col gap-y-7 p3">
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
                                    <x-member-nav-link href="{{ url('/member/appointments') }}" :active="request()->is('member/appointments')">
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

        <div class="hidden lg:fixed lg:inset-y-0 lg:z-40 lg:flex lg:w-60 lg:flex-col">
            <div class="flex grow flex-col overflow-y-auto">
                <div class="h-full p-0 bg-white border">
                    <nav class="flex flex-1
                    flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-6 px-4 ">
                            <li>
                                <ul role="list" class=" space-y-1 ">
                                    <li class="pt-24">
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
                                                <svg class="w-8 h-8 ml--2" viewBox="0 0 45 45" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" stroke="#fffafa">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M33 16.5H35C35.552 16.5 36 16.948 36 17.5V27.5C36 28.052 35.552 28.5 35 28.5H33C32.448 28.5 32 28.052 32 27.5V17.5C32 16.948 32.448 16.5 33 16.5Z"
                                                            stroke="#3C3C3C" stroke-width="2"></path>
                                                        <path
                                                            d="M29 12.5H31C31.552 12.5 32 12.948 32 13.5V31.5C32 32.052 31.552 32.5 31 32.5H29C28.448 32.5 28 32.052 28 31.5V13.5C28 12.948 28.448 12.5 29 12.5Z"
                                                            stroke="#3C3C3C" stroke-width="2"></path>
                                                        <path
                                                            d="M15 12.5H17C17.552 12.5 18 12.948 18 13.5V31.5C18 32.052 17.552 32.5 17 32.5H15C14.448 32.5 14 32.052 14 31.5V13.5C14 12.948 14.448 12.5 15 12.5Z"
                                                            stroke="#3C3C3C" stroke-width="2"></path>
                                                        <path
                                                            d="M11 16.5H13C13.552 16.5 14 16.948 14 17.5V27.5C14 28.052 13.552 28.5 13 28.5H11C10.448 28.5 10 28.052 10 27.5V17.5C10 16.948 10.448 16.5 11 16.5Z"
                                                            stroke="#3C3C3C" stroke-width="2"></path>
                                                        <path d="M36 22.5H39" stroke="#3C3C3C" stroke-width="2">
                                                        </path>
                                                        <path d="M18 22.5H28" stroke="#3C3C3C" stroke-width="2">
                                                        </path>
                                                        <path d="M7 22.5H10" stroke="#3C3C3C" stroke-width="2"></path>
                                                    </g>
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
                                        <x-member-nav-link href="{{ url('/member/tutorials') }}" :active="request()->is('member/tutorials')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Tutorials
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
                                        <x-member-nav-link href="{{ url('/member/recommendations') }}"
                                            :active="request()->is('member/recommendations')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Recommendations
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/feedback') }}" :active="request()->is('member/feedback')">
                                            <x-slot:icon>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                                </svg>
                                            </x-slot:icon>
                                            Feedback
                                        </x-member-nav-link>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </nav>

                </div>
            </div>
        </div>

        <div class="lg:pl-60 bg-white">
            <div class="lg:pl-60 bg-white">
                <div class="sticky top-0 z-40 flex h-14 shrink-0 items-center gap-x-4 px-4 shadow-sm sm:px-6 lg:px-8">
                    <button id="menuButton" type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <div class="flex flex-1 justify-end gap-x-4 lg:gap-x-6 p-4">
                        <button type="button" class="-m-2.5 p-2.5 text-white hover:text-gray-500"
                            id="dropdownButton">
                            <span class="sr-only">View profile</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-6 2.69-6 6v1h12v-1c0-3.31-2.69-6-6-6z" />
                            </svg>
                        </button>
                        <div class="absolute right-0 hidden mt-2 w-48 rounded-md  bg-white  shadow-lg"
                            id="dropdownMenu">
                            <ul class="py-1">
                                <li>
                                    <form method="POST" action="/logout" class="inline-block text-center mx-auto">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Logout</button>
                                    </form>
                                </li>
                                <li>
                                    <a href="/profile"
                                        class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100">Profile</a>
                                </li>
                            </ul>
                        </div>
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
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

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
        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicked outside
        window.addEventListener('click', function(event) {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
