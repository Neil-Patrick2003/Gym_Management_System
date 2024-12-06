<x-app-layout>
    <div class="overflow-hidden rounded-lg mb-4">
        <div class="border-b border-b-gray-900/10 lg:b bg-white order-t lg:border-t-gray-900/5">
            <dl class="mx-auto grid max-w-7xl grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 lg:px-2 xl:px-0">
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">All Members</dt>
                    <dd class="text-xs font-medium text-gray-700"></dd>
                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{ $all_members }}
                    </dd>
                </div>
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Active</dt>
                    <dd class="text-xs font-medium text-rose-600"></dd>
                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{$active_members_count}}</dd>
                </div>
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:px-6 lg:border-l lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Inactive</dt>
                    <dd class="text-xs font-medium text-gray-700"></dd>
                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{$inactive_members_count}}</dd>
                </div>
                <div
                    class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-2 border-t border-gray-900/5 px-4 py-10 sm:border-l sm:px-6 lg:border-t-0 xl:px-8">
                    <dt class="text-sm/6 font-medium text-gray-500">Join Today</dt>
                    <dd class="text-xs font-medium text-rose-600"></dd>
                    <dd class="w-full flex-none text-3xl/10 font-medium tracking-tight text-gray-900">{{$joined_today_members_count}}</dd>
                </div>
            </dl>
        </div>


        <ul role="list" class="grid grid-cols-1 gap-2 sm:grid-cols-2 lg:grid-cols-3 mt-6">
            @foreach ($members as $member)
                <li
                    class="col-span-1 divide-y divide-gray-200 rounded-lg bg-white shadow transition duration-300 ease-in-out  hover:bg-gray-100 hover:shadow-lg">
                    <div class="flex w-full items-center justify-between space-x-6 p-6">
                        <div class="flex-1 truncate">
                            <div class="flex items-center space-x-3">
                                <h3 class="truncate text-sm font-medium text-gray-900">{{ $member->name }}</h3>


                                <span
                                    class="inline-flex shrink-0 items-center rounded-full {{ $member->days_since_joined >= 30 ? 'bg-green-50 text-green-700 ring-green-600/20' : 'bg-yellow-50 text-yellow-700 ring-yellow-600/20' }} px-1.5 py-0.5 text-xs font-medium ring-1 ring-inset">

                                    @if ($member->days_since_joined >= 1 && $member->days_since_joined <= 7)
                                        Joined {{ round($member->days_since_joined, 0) }} days ago
                                    @elseif ($member->days_since_joined >= 7)
                                        Old Member
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
                        <div class="-mt-px flex divide-x divide-gray-200 bg-red-600 shadow">
                            <div class="flex w-0 flex-1">
                                <a href="mailto:{{ $member->email }}"
                                    class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-white tracking-widest hover:bg-red-700">
                                    <svg class="size-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path
                                            d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                                        <path
                                            d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                                    </svg>
                                    Email
                                </a>
                                <a href="/admin/members/details/{{ $member->id }}"
                                    class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3  border border-transparent py-4 text-sm font-semibold text-white tracking-widest hover:bg-red-700">
                                    <svg class="w-[22px] h-[22px] text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Details
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>




</x-app-layout>
