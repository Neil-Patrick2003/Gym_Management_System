<x-member-layout>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="text-red-600">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            <p class="text-red-600">{{ session('message') }}</p>
        </div>
    @endif

    <div class="mt-6" x-data="{ open: false }" x-init="open = false" x-cloak>
        <!-- Button (blue) -->
        <button class="px-4 py-2 text-white bg-blue-500 rounded select-none no-outline focus:shadow-outline"
                @click="open = true">Book a Session</button>
    
        <!-- Dialog (Full screen) -->
        <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full"
             style="background-color: rgba(0, 0, 0, .1); z-index: 9999; position: fixed; top: 0; left: 0;"
             x-show="open" x-transition>
    
            <!-- A basic modal dialog with title, body, and close button -->
            <div class="h-auto p-4 mx-2 text-left bg-white rounded shadow-xl md:max-w-xl lg:w-1/3 w-full md:p-6 lg:p-8 md:mx-0 overflow-auto"
                 @click.away="open = false">
                <form action="/member/appointments" method="POST">
                    @csrf
                    <div class="flex flex-col space-y-4">
    
                        <center>
                            <h1 class="font-bold text-xl">Create Appointment</h1>
                        </center>
    
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
    
                        <!-- Error message when duration is greater than 3 hours -->
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
    
                <!-- Close button -->
                <div class="mt-5 sm:mt-6">
                    <span class="flex w-full rounded-md shadow-sm">
                        <button @click="open = false"
                                class="inline-flex justify-center w-full px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-700">
                            Close this modal!
                        </button>
                    </span>
                </div>
    
            </div>
        </div>
    </div>
    

    <div class="overflow-scroll ...">
        <div id="calendar"></div>
    </div>




    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900">My Appointment</h1>
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
                                    Start Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    ENd Date</th>
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
                                                <div class="font-medium text-gray-900">
                                                    {{ $appointment->trainer->name }}
                                                </div>
                                                <div class="mt-1 text-gray-500">{{ $appointment->trainer->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <div class="text-gray-900">{{ $appointment->start_time }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        {{ $appointment->end_date }}</td>

                                    <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        @if ($appointment->status == 'Accepted')
                                            <span
                                                class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $appointment->status }}</span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-xs font-medium text-red-700 ring-1 ring-inset ring-red-600/20">{{ $appointment->status }}</span>
                                        @endif

                                    </td>
                                    <td
                                        class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form action="/member/appointment/{{ $appointment->id }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <button type="submit"
                                                class="text-indigo-600 hover:text-indigo-900">Cancel</button>
                                        </form>
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
















    <!-- Add JavaScript to make the dropdown open and handle selection -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const trainerIdInput = document.getElementById('trainer-id');
            const modal = document.getElementById('modal-id');
            const openModalBtn = document.querySelector('button[type="submit"]'); // submit button to trigger modal
            const closeModalBtn = document.getElementById('close-modal-btn');
            const confirmModalBtn = document.getElementById('confirm-modal-btn');

            // Toggle the dropdown visibility when the button is clicked
            dropdownButton.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });

            // Update the button and hidden input when a trainer is selected
            const selectOptions = document.querySelectorAll('.select-option');
            selectOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const trainerName = option.querySelector('span').textContent;
                    const trainerId = option.getAttribute('data-id');

                    // Update the button text and the hidden input value
                    dropdownButton.textContent = trainerName;
                    trainerIdInput.value = trainerId;

                    // Close the dropdown
                    dropdownMenu.classList.add('hidden');
                });
            });

            // Optional: Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });

            // Open the modal when the user clicks the "Submit" button
            openModalBtn.addEventListener('click', function(event) {
                event.preventDefault(); // prevent form submission to show modal
                modal.classList.remove('hidden', 'opacity-0', 'pointer-events-none');
                modal.classList.add('opacity-100', 'pointer-events-auto');
            });

            // Close the modal when the "Cancel" button is clicked
            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden', 'opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
            });

            // Close the modal when the backdrop is clicked
            modal.querySelector('.fixed.inset-0.bg-gray-500/75').addEventListener('click', function() {
                modal.classList.add('hidden', 'opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
            });

            // Confirm action when the "Confirm" button is clicked
            confirmModalBtn.addEventListener('click', function() {
                // Here you can submit the form or trigger any desired action
                // For now, it will simply submit the form
                document.querySelector('form').submit(); // submit the form
                modal.classList.add('hidden', 'opacity-0', 'pointer-events-none');
                modal.classList.remove('opacity-100', 'pointer-events-auto');
            });
        });
    </script>



    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    slotMinTime: '7:00:00',
                    slotMaxTime: '22:00:00',
                    events: @json($events),
                });
                calendar.render();
            });
        </script>
    @endpush

</x-member-layout>
