<x-trainer-layout>
    <div class="mt-6 p-4 sm:p-6 bg-gray-100 lg:px-8">



        <div class="px-4 py-5  sm:px-6">
            <h1 class="text-base font-semibold text-gray-900">Appointments</h1>
        </div>
        <div class="p-0">


            <div class="relative  overflow-x-auto shadow-md  bg-blue-700">
                <table class="w-full bg-white text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Member Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Date
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Duration
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Status
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                        </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only"></span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            @if ($appointment->status == 'Accepted')
                                <tr class="bg-white border">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                        {{ $appointment->user->name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{-- Format the start time --}}
                                        {{ \Carbon\Carbon::parse($appointment->start_time)->format('F j, Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{-- Calculate the duration --}}
                                        @php
                                            $start_time = \Carbon\Carbon::parse($appointment->start_time);
                                            $end_time = \Carbon\Carbon::parse($appointment->end_date);

                                            // Calculate the total duration in minutes
                                            $duration_in_minutes = $start_time->diffInMinutes($end_time);

                                            // Get total hours and remaining minutes
                                            $hours = floor($duration_in_minutes / 60);
                                            $minutes = $duration_in_minutes % 60;

                                            // Create the duration string
                                            $duration_text = "{$hours} hours {$minutes} minutes";
                                        @endphp
                                        {{ $duration_text }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @php

                                            $currentTime = \Carbon\Carbon::now();
                                            $startTime = \Carbon\Carbon::parse($appointment->start_time);
                                            $endTime = \Carbon\Carbon::parse($appointment->end_date);
                                            // Determine the status
                                            if ($currentTime->lt($startTime)) {
                                                $status = 'Basta ikaw na bahala'; // before the appointment starts
                                            } elseif ($currentTime->gt($endTime)) {
                                                $status = 'Completed'; // after the appointment ends
                                            } elseif ($currentTime->between($startTime, $endTime)) {
                                                $status = 'Ongoing'; // appointment is currently ongoing
                                            } else {
                                                $status = 'Unknown'; // fallback
                                            }
                                        @endphp

                                        {{ $status }}
                                    </td>

                                    <td class="px-6 py-4 text-right">
                                        <a href="#"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach




                    </tbody>
                </table>
            </div>

        </div>



        <div class="mt-8 overflow-hidden rounded-lg bg-white shadow">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    @if (session('success'))
                        <div id="success-alert"
                            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                                <button type="button"
                                    onclick="document.getElementById('success-alert').style.display='none'">
                                    <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <title>Close</title>
                                        <path
                                            d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
                                    </svg>
                                </button>
                            </span>
                        </div>
                    @endif
                    <div class="flex p-px lg:col-span-4 px-4 border ring-1 ring-white/15 ">
                        <table class="w-full  divide-y divide-gray-300 rounded-lg bg-white ring-1 ring-white/15 mr-6">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Member
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Start Time</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        End Time</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Status</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        Action
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach ($appointments as $appointment)
                                    @if ($appointment->status == 'Pending' || $appointment->status == 'Denied')
                                        <tr>
                                            <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                                <div class="flex items-center">
                                                    <div class="size-11 shrink-0">
                                                        <img class="size-11 rounded-full"
                                                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png"
                                                            alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">
                                                            {{ $appointment->user->name }}
                                                        </div>
                                                        <div class="mt-1 text-gray-500">{{ $appointment->user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">

                                                    <div class="text-sm font-medium">
                                                        <div class="mb-1">
                                                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('jS F Y') }}
                                                        </div>
                                                        <hr class="my-2">

                                                        <div>
                                                            {{ \Carbon\Carbon::parse($appointment->start_time)->format('h:i:s A') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">
                                                    <div class="text-sm font-medium">
                                                        <div class="mb-1">
                                                            {{ \Carbon\Carbon::parse($appointment->end_time)->format('jS F Y') }}
                                                        </div>
                                                        <hr class="my-2">
                                                        <div>
                                                            {{ \Carbon\Carbon::parse($appointment->end_time)->format('h:i:s A') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                @if ($appointment->status === 'Pending')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20">
                                                        Waiting for Approval
                                                    </span>
                                                @elseif ($appointment->status === 'Accepted')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-600/20">
                                                        Accepted
                                                    </span>
                                                @elseif ($appointment->status === 'Denied')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                                        Rejected
                                                    </span>
                                                @elseif ($appointment->status === 'Completed')
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                        Completed
                                                    </span>
                                                @else
                                                    <span
                                                        class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-500 ring-1 ring-inset ring-gray-400/20">
                                                        Expired
                                                    </span>
                                                @endif
                                            </td>
                                            <td
                                                class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                @if ($appointment->status !== 'Accepted' && $appointment->status !== 'Denied')
                                                    <!-- Accept Button Form -->
                                                    <form action="/trainer/appointments/{{ $appointment->id }}"
                                                        method="POST" class="mb-2">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="apointment_id"
                                                            value="{{ $appointment->id }}">
                                                        <input type="hidden" name="status" value="Accepted">
                                                        <button type="submit"
                                                            class="w-full rounded bg-green-100 px-2 py-1 text-xs font-semibold text-green-600 shadow-sm hover:bg-green-200"
                                                            {{ $appointment->status === 'Accepted' ? 'disabled' : '' }}>
                                                            Accept
                                                        </button>
                                                    </form>

                                                    <form action="/trainer/appointments/{{ $appointment->id }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="apointment_id"
                                                            value="{{ $appointment->id }}">
                                                        <input type="hidden" name="status" value="Denied">
                                                        <button type="submit"
                                                            class="w-full rounded bg-red-100 px-2 py-1 text-xs font-semibold text-red-600 shadow-sm hover:bg-red-200"
                                                            {{ $appointment->status === 'Denied' ? 'disabled' : '' }}>
                                                            Reject
                                                        </button>
                                                    </form>
                                                @else
                                                    <span class="text-gray-500 text-xs">
                                                        {{ $appointment->status === 'Accepted' ? 'Accepted' : 'Rejected' }}
                                                    </span>
                                                @endif
                                            </td>



                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>



</x-trainer-layout>
