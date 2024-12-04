<x-member-layout>
    <form action="/member/appointments" method="POST">
        @csrf
        <div class="flextext-white mt-6 flex-col space-y-4 max-w-md mx-auto p-6 bg-white shadow-lg rounded-lg">
            <center>
                <h1 class="font-bold">Create Appointment</h1>
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

            {{-- Error message when duration is greater than 3 hrs --}}
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

    <!-- Add JavaScript to make the dropdown open and handle selection -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const dropdownButton = document.getElementById('dropdown-button');
            const dropdownMenu = document.getElementById('dropdown-menu');
            const trainerIdInput = document.getElementById('trainer-id');

            // Toggle the dropdown visibility when the button is clicked
            dropdownButton.addEventListener('click', function () {
                dropdownMenu.classList.toggle('hidden');
            });

            // Update the button and hidden input when a trainer is selected
            const selectOptions = document.querySelectorAll('.select-option');
            selectOptions.forEach(option => {
                option.addEventListener('click', function () {
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
            document.addEventListener('click', function (e) {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.add('hidden');
                }
            });
        });
    </script>

</x-member-layout>
