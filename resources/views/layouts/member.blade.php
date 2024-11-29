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
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>


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
                <div class="h-full p-0 bg-white border border-red-500 border-lg">
                    <nav class="flex flex-1
                    flex-col">
                        <ul role="list" class="flex flex-1 flex-col gap-y-6 px-4 ">
                            <li>
                                hi
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
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M20.29 8.567c.133.323.334.613.59.85v.002a3.536 3.536 0 0 1 0 5.166 2.442 2.442 0 0 0-.776 1.868 3.534 3.534 0 0 1-3.651 3.653 2.483 2.483 0 0 0-1.87.776 3.537 3.537 0 0 1-5.164 0 2.44 2.44 0 0 0-1.87-.776 3.533 3.533 0 0 1-3.653-3.654 2.44 2.44 0 0 0-.775-1.868 3.537 3.537 0 0 1 0-5.166 2.44 2.44 0 0 0 .775-1.87 3.55 3.55 0 0 1 1.033-2.62 3.594 3.594 0 0 1 2.62-1.032 2.401 2.401 0 0 0 1.87-.775 3.535 3.535 0 0 1 5.165 0 2.444 2.444 0 0 0 1.869.775 3.532 3.532 0 0 1 3.652 3.652c-.012.35.051.697.184 1.02ZM9.927 7.371a1 1 0 1 0 0 2h.01a1 1 0 0 0 0-2h-.01Zm5.889 2.226a1 1 0 0 0-1.414-1.415L8.184 14.4a1 1 0 0 0 1.414 1.414l6.218-6.217Zm-2.79 5.028a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </x-slot:icon>
                                            My Progress
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/tutorials') }}" :active="request()->is('member/tutorials')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M19.003 3A2 2 0 0 1 21 5v2h-2V5.414L17.414 7h-2.828l2-2h-2.172l-2 2H9.586l2-2H9.414l-2 2H3V5a2 2 0 0 1 2-2h14.003ZM3 9v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Zm2-2.414L6.586 5H5v1.586Zm4.553 4.52a1 1 0 0 1 1.047.094l4 3a1 1 0 0 1 0 1.6l-4 3A1 1 0 0 1 9 18v-6a1 1 0 0 1 .553-.894Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </x-slot:icon>
                                            Tutorials
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/appointments') }}" :active="request()->is('member/appoinments')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M18 5.05h1a2 2 0 0 1 2 2v2H3v-2a2 2 0 0 1 2-2h1v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1h3v-1a1 1 0 1 1 2 0v1Zm-15 6v8a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-8H3ZM11 18a1 1 0 1 0 2 0v-1h1a1 1 0 1 0 0-2h-1v-1a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </x-slot:icon>
                                            Appointment
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/recommendations') }}"
                                            :active="request()->is('member/recommendations')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M3.559 4.544c.355-.35.834-.544 1.33-.544H19.11c.496 0 .975.194 1.33.544.356.35.559.829.559 1.331v9.25c0 .502-.203.981-.559 1.331-.355.35-.834.544-1.33.544H15.5l-2.7 3.6a1 1 0 0 1-1.6 0L8.5 17H4.889c-.496 0-.975-.194-1.33-.544A1.868 1.868 0 0 1 3 15.125v-9.25c0-.502.203-.981.559-1.331ZM7.556 7.5a1 1 0 1 0 0 2h8a1 1 0 0 0 0-2h-8Zm0 3.5a1 1 0 1 0 0 2H12a1 1 0 1 0 0-2H7.556Z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </x-slot:icon>
                                            Recommendations
                                        </x-member-nav-link>
                                    </li>
                                    <li>
                                        <x-member-nav-link href="{{ url('/member/feedback') }}" :active="request()->is('member/feedback')">
                                            <x-slot:icon>
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M7.556 8.5h8m-8 3.5H12m7.111-7H4.89a.896.896 0 0 0-.629.256.868.868 0 0 0-.26.619v9.25c0 .232.094.455.26.619A.896.896 0 0 0 4.89 16H9l3 4 3-4h4.111a.896.896 0 0 0 .629-.256.868.868 0 0 0 .26-.619v-9.25a.868.868 0 0 0-.26-.619.896.896 0 0 0-.63-.256Z" />
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
                        <div class="relative inline-block text-left">
                            <div>
                                <button type="button" id="dropdownButton"
                                    class="inline-flex w-full justify-center gap-x-1.5  bg-white px-3 py-2 text-sm font-semibold text-red-500 "
                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                    {{Auth::user()->name}}
                                    <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path fill-rule="evenodd"
                                            d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>


                            <div class="absolute hidden  right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none"
                                id="dropdownMenu" role="menu" aria-orientation="vertical"
                                aria-labelledby="menu-button" tabindex="-1">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900 outline-none", Not Active: "text-gray-700" -->
                                    <form method="POST" action="/logout" class="inline-block text-center mx-auto">
                                        @csrf
                                        <button type="submit"
                                            class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-500">Logout</button>
                                    </form>
                                    <a href="/proflie" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                        tabindex="-1" id="menu-item-1">Profile</a>
                                </div>
                            </div>
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
