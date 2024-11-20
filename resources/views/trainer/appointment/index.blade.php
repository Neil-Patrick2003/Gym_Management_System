<x-trainer-layout>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900">Users</h1>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                    {{-- alert message --}}
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
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Member
                                    Name
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Start Time</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    End Time</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="size-11 shrink-0">
                                                <img class="size-11 rounded-full"
                                                    src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                    alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="font-medium text-gray-900">{{ $appointment->user->name }}
                                                </div>
                                                <div class="mt-1 text-gray-500">{{ $appointment->user->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">
                                            {{ \Carbon\Carbon::parse($appointment->start_time)->format(' jS F Y h:i:s A') }}
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">
                                            {{ \Carbon\Carbon::parse($appointment->end_time)->format(' jS F Y h:i:s A') }}
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
                                                Approved
                                            </span>
                                        @elseif ($appointment->status === 'Denied')
                                            <span
                                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">
                                                Denied
                                            </span>
                                        @elseif ($appointment->status === 'Completed')
                                            <span
                                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                                Completed
                                            </span>
                                        @elseif ($appointment->status === 'Expired')
                                            <span
                                                class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-600/20">
                                                Expired
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-500 ring-1 ring-inset ring-gray-400/20">
                                                Unknown Status
                                            </span>
                                        @endif
                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form action="/trainer/appointments/{{ $appointment->id }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="apointment_id" value="{{ $appointment->id }}">
                                            <input type="hidden" name="status" value="Accepted">
                                            <button type="submit"
                                                class="rounded bg-red-50 px-2 py-1 text-xs font-semibold text-indigo-600 shadow-sm hover:bg-red-100">Accept</button>
                                        </form>

                                        <form action="/trainer/appointments/{{ $appointment->id }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="apointment_id" value="{{ $appointment->id }}">
                                            <input type="hidden" name="status" value="Denied">
                                            <button type="submit"
                                                class="rounded bg-red-50 px-2 py-1 text-xs font-semibold text-indigo-600 shadow-sm hover:bg-red-100">Rejected</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-trainer-layout>
