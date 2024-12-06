<x-app-layout>
    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($members as $member)
            <!-- Card -->
            <li class="group col-span-1 divide-y divide-gray-200 rounded-lg shadow-lg bg-gradient-to-r from-orange-500 via-red-500 to-red-700 transition-transform duration-200 hover:scale-105">
                <!-- Header -->
                <div class="flex w-full items-center justify-between p-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-lg font-bold text-white">
                                {{ $member->name }}
                            </h3>
                            <span
                                class="inline-flex items-center rounded-full bg-green-100 px-2 py-0.5 text-xs font-medium text-green-700 ring-1 ring-green-500">
                                Admin
                            </span>
                        </div>
                        <p class="mt-1 truncate text-sm text-gray-100">
                            Regional Paradigm Technician
                        </p>
                    </div>
                    <img class="h-12 w-12 rounded-full object-cover"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60"
                        alt="{{ $member->name }}'s profile picture">
                </div>

                <!-- Footer -->
                <div class="flex">
                    <!-- Email Button -->
                    <a href="mailto:janecooper@example.com"
                        class="flex-1 flex items-center justify-center gap-x-3 py-4 text-sm font-semibold text-gray-800 bg-white hover:shadow-lg transition-shadow duration-200 rounded-bl-lg">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path
                                d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                            <path
                                d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                        </svg>
                        Email
                    </a>
                    <!-- Call Button -->
                    <a href="tel:+1-202-555-0170"
                        class="flex-1 flex items-center justify-center gap-x-3 py-4 text-sm font-semibold text-gray-800 bg-white hover:shadow-lg transition-shadow duration-200 rounded-br-lg">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z"
                                clip-rule="evenodd" />
                        </svg>
                        Call
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</x-app-layout>
