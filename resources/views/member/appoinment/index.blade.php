<x-member-layout>





    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900">Users</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the users in your account including their name,
                    title, email and role.</p>
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button type="button"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add
                    user</button>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                    Trainer
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Start</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    End</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    Status</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach ($appointments as $appointment)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="mt-1 text-gray-500">
                                                    {{ $appointment->trainer->name ?? 'No Trainer Assigned' }}</div>
                                                <div class="mt-1 text-sm text-gray-500">
                                                    {{ $appointment->trainer->email }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900"> {{ $appointment->start_time }} </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900"> {{ $appointment->start_time }} </div>

                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        @if ($appointment->status === 'Pending')
                                            <span
                                                class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-700 ring-1 ring-inset ring-yellow-600/20">
                                                Waiting for Approval
                                            </span>
                                        @elseif ($appointment->status === 'Approved')
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
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit<span
                                                class="sr-only">, Lindsay Walton</span></a>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





































    <form action="/member/appointments" method="POST">
        @csrf
        <div class="flex flex-col space-y-4 max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
            <!-- Start Time Picker -->
            <div>
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Date & Time</label>
                <input type="datetime-local" id="start_time" name="start_time"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            @error('start_time')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- End Time Picker -->
            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Date & Time</label>
                <input type="datetime-local" id="end_time" name="end_time"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>
            @error('end_time')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            {{-- error message when duration is greater than 3 hrs --}}
            @if ($errors->has('error'))
                <div class="text-red-500 text-sm mb-4">
                    {{ $errors->first('error') }}
                </div>
            @endif

            <!-- Custom Dropdown for Trainers -->
            <div class="relative inline-block text-left" id="dropdown-container">
                <label for="trainer-dropdown" class="block text-sm font-medium text-gray-700">Select Trainer</label>
                <div>
                    <button type="button" id="dropdown-button"
                        class="w-full flex items-center justify-between px-4 py-2 border border-gray-300 rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Select a Trainer
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="dropdown-menu"
                        class="hidden mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                        @foreach ($trainers as $trainer)
                            <div data-id="{{ $trainer->id }}"
                                class="select-option flex items-center px-4 py-2 text-gray-700 hover:bg-blue-100 cursor-pointer">
                                <img src="https://randomuser.me/api/portraits/men/{{ $trainer->id }}.jpg"
                                    alt="{{ $trainer->name }}" class="h-6 w-6 rounded-full mr-3">
                                <span>{{ $trainer->name }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Hidden input for trainer_id -->
                <input type="hidden" name="trainer_id" id="trainer-id">
            </div>
            @error('trainer_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Submit
                </button>
            </div>
        </div>
    </form>

    <script>
        // JavaScript for opening, closing, and selecting items in dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const dropdownItems = document.querySelectorAll('.select-option');
            const trainerIdInput = document.getElementById('trainer-id');

            // Toggle dropdown visibility on button click
            dropdownButton.addEventListener('click', function(event) {
                event.stopPropagation();
                dropdownMenu.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            // Select an option and set the trainer ID
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    const trainerId = item.getAttribute('data-id'); // Get the trainer ID
                    trainerIdInput.value = trainerId; // Set the hidden input value

                    // Update button text to selected trainer name
                    const trainerName = item.querySelector('span').textContent;
                    dropdownButton.textContent = `Selected: ${trainerName}`;

                    // Close the dropdown
                    dropdownMenu.classList.add('hidden');
                });
            });
        });
    </script>
</x-member-layout>
