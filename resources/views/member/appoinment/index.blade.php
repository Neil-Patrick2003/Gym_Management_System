<x-member-layout>
    <div id="calendar"></div>


    <div id="calendar" class="mt-6"></div> <!-- Calendar Container -->

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');

                if (calendarEl) {
                    // Initialize the FullCalendar
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'timeGridWeek', // Weekly view with time slots
                        slotMinTime: '07:00:00', // Earliest hour to show (8 AM)
                        slotMaxTime: '19:00:00', // Latest hour to show (7 PM)
                        allDaySlot: false, // Hide the all-day event section
                        events: @json($events), // Load events from Laravel
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'timeGridWeek,dayGridMonth'
                        },
                        selectable: true,
                        selectMirror: true,
                        businessHours: {
                            // Set available business hours (can vary by day)
                            daysOfWeek: [1, 2, 3, 4, 5], // Monday - Friday
                            startTime: '07:00', // Business hours start time
                            endTime: '19:00', // Business hours end time
                        },
                        editable: false, // Disable drag and drop to modify events
                        nowIndicator: true, // Shows a line indicating the current time
                    });

                    calendar.render();
                } else {
                    console.error('Calendar element not found');
                }
            });
        </script>
    @endpush


    <form action="/member/appointments" method="POST">
        @csrf
        <div class="flextext-white mt-6 flex-col space-y-4 max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
            <center>
                <h1 class="font-bold	">Create Appointment</h1>
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

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    {{-- @push('scripts')
            <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'timeGridWeek',
                        slotMinTime: '8:00:00',
                        slotMaxTime: '19:00:00',
                        events: @json($events),
                    });
                    calendar.render();
                });
            </script>
        @endpush --}}

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
