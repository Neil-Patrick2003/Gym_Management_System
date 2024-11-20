<x-app-layout>
    <div class="mb-3">
        <h1>All Members</h1>
    </div>

    <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach ($members as $member)
            <li class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow">
                <div class="flex w-full items-center justify-between space-x-6 p-6">
                    <div class="flex-1 truncate">
                        <div class="flex items-center space-x-3">
                            <h3 class="truncate text-sm font-medium text-gray-900">{{ $member->name }}</h3>
                            @php
                                // Calculate the number of days since the user joined
                                $daysSinceJoined = now()->diffInDays($member->created_at);
                            @endphp

                            <span
                                class="inline-flex shrink-0 items-center rounded-full {{ $daysSinceJoined >= 30 ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' }} px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset">
                                @if ($daysSinceJoined >= 30)
                                    Joined {{ $daysSinceJoined }} days ago
                                @else
                                    New member
                                @endif
                            </span>
                        </div>
                        <p class="mt-1 truncate text-sm text-gray-500">
                            Member since {{ \Carbon\Carbon::parse($member->created_at)->format('F j, Y') }}
                        </p>

                    </div>
                    <img class="size-10 shrink-0 rounded-full bg-gray-300"
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTruq-IX6Xj3QHR6Bq5nrLeY1PXh9aYVYszSKMUrOMPw-i0OhojWNnbVODSBQEANBCQ58&usqp=CAU"
                        alt="">
                </div>
                <div>
                    <div class="-mt-px flex divide-x divide-gray-200">
                        <div class="flex w-0 flex-1">
                            <a href="mailto:{{ $member->email }}"
                                class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                <svg class="size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path
                                        d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                                    <path
                                        d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                                </svg>
                                Email
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach


        <!-- More people... -->
    </ul>




</x-app-layout>
