<x-app-layout>
    {{-- <div class="relative border border-white rounded-lg mb-4 overflow-hidden"
        style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 300px;
                border-radius: 15px;
                opacity: 98%;">

        <div class="absolute   px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
            <div>
                <h2 class="text-white text-xl font-bold">{{ $program->name }}</h2>
                <p class="text-white">Created by: {{ $program->created_by }}</p>
            </div>
        </div>
    </div>

    <div class="px-4 py-5 sm:p-2 mb-2">
        <center>
            <a onclick="add()" href="javascript:void(0)" class="inline-block">
                <button type="button"
                    class="flex items-center gap-2 rounded-full bg-gradient-to-r from-yellow-600 to-red-600 p-2 px-4 text-white shadow-sm
                           hover:from-red-600 hover:to-yellow-600 focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path
                            d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                    </svg>
                    <span>Add Schedules</span>
                </button>
            </a>
        </center>
    </div>

    @foreach ($program_schedules as $program_schedule)
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow mb-2">
            <div class="px-4 py-5 sm:px-6">
                <h1>
                    {{ $program_schedule->name }}
                </h1>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <!-- Content goes here -->
            </div>
            <div class="px-4 py-4 sm:px-6">
                <center>
                    <a onclick="addExercise()" href="javascript:void(0)" class="inline-block">
                        <button type="button"
                            class="flex items-center gap-1 rounded-full bg-gradient-to-r from-yellow-600 to-red-600 p-1 px-2 text-white shadow-sm
                           hover:from-red-600 hover:to-yellow-600 focus-visible:outline focus-visible:outline-2
                           focus-visible:outline-offset-2 focus-visible:outline-indigo-600 text-sm">
                            <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path
                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                            </svg>
                            <span class="text-xs">Add more exercise</span>
                        </button>
                    </a>
                </center>
            </div>
        </div>
    @endforeach









    <div class="relative z-10 hidden" aria-labelledby="add-schedule-modal" role="dialog" aria-modal="true"
        id="add-schedule-modal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <h1>Add New Schedule</h1>

                    <form action="javascript:void(0)" id="ScheduleForm" name="ScheduleForm" method="POST">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-12">
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <input id="name" name="name" type="text"
                                                class="py-1.5 px-2 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                        @error('name')
                                            <p class="text-xs text-red-500 font-italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a id="cancel-btn" href="javascript:void(0)"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 hidden" aria-labelledby="add-exercise-modal" role="dialog" aria-modal="true"
        id="add-exercise-modal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <h1>Add New Exercise</h1>

                    <form action="javascript:void(0)" id="ExerciseForm" name="ExerciseForm" method="POST">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-12">
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">

                                        <label for="exercise-name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Exercise
                                            Name</label>
                                        <div class="mt-2">
                                            <input id="exercise-name" name="exercise_name" type="text"
                                                class="py-1.5 px-2 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                        @error('exercise_name')
                                            <p class="text-xs text-red-500 font-italic mt-1">{{ $message }}</p>
                                        @enderror

                                        <label for="reps"
                                            class="block text-sm font-medium leading-6 text-gray-900 mt-4">Reps</label>
                                        <div class="mt-2">
                                            <input id="reps" name="reps" type="number" min="1"
                                                class="py-1.5 px-2 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>

                                        <label for="sets"
                                            class="block text-sm font-medium leading-6 text-gray-900 mt-4">Sets</label>
                                        <div class="mt-2">
                                            <input id="sets" name="sets" type="number" min="1"
                                                class="py-1.5 px-2 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <a id="cancel-exercise-btn" href="javascript:void(0)"
                                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





    <script>
        function addExercise() {
            $('#add-exercise-modal').removeClass('hidden'); // Show the exercise modal
        }

        function add() {
            $('#add-schedule-modal').removeClass('hidden'); // Show the modal
        }

        $('#cancel-btn').click(function() {
            $('#add-schedule-modal').addClass('hidden');
        });

        $('#ScheduleForm').submit(function(e) {
            e.preventDefault(); // Prevent the default form submission

            var formData = new FormData(this);
            var programId = $('input[name="program_id"]').val(); // Get the program ID

            $.ajax({
                type: 'POST',
                url: `/admin/programs/program/${programId}`, // Correctly use the program ID with a slash
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data); // Log success response
                    $('#success-message').text(data.success).removeClass('hidden').fadeIn().delay(3000)
                        .fadeOut(); // Show success message
                    $('#add-schedule-modal').addClass('hidden'); // Hide modal after success
                    location.reload(); // Reload the page to see the new schedule
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
        });
    </script> --}}


    <div class="relative border border-white rounded-lg mb-4 overflow-hidden"
        style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
             background-repeat: no-repeat;
             background-position: center;
             background-size: cover;
             height: 300px;
             border-radius: 15px;
             opacity: 98%;">
        <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
            <div>
                <h2 class="text-white text-xl font-bold">{{ $program->name }}</h2>
                <p class="text-white">Created by: {{ $program->created_by }}</p>
            </div>
        </div>
    </div>

    <div class="px-4 py-5 sm:p-2 mb-2">
        <center>
            <button
                class="open-modal flex items-center gap-2 bg-gradient-to-r from-yellow-600 to-red-600 text-white px-4 py-2 rounded-full shadow-md hover:from-red-600 hover:to-yellow-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                data-modal="modal1">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                </svg>
                <span>Add Schedule</span>
            </button>
        </center>
    </div>

    @foreach ($program_schedules as $program_schedule)
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow mb-2">
            <div class="px-4 py-5 sm:px-6">
                <h1>{{ $program_schedule->name }}</h1>
            </div>
            <div class="px-4 py-5 sm:p-6">
{{--
                @foreach ($daily_exercises as $daily_exercise)
                1
                @endforeach --}}
            </div>
            <div class="px-4 py-4 sm:px-6">
                <center>
                    <button class="open-modal bg-green-500 text-white px-4 py-2 rounded" data-modal="modal2"
                        data-id="{{ $program_schedule->id }}" data-name="{{ $program_schedule->name }}">
                        Add Exercise
                    </button>
                </center>
            </div>
        </div>
    @endforeach

    <button class="open-modal" data-modal="modal3">Open Modal 3</button>

    <!-- Modal 1 -->
    <div class="modal hidden" id="modal1" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <h1>Add New Schedule</h1>
                    <form action="javascript:void(0)" id="ScheduleForm" name="ScheduleForm" method="POST">
                        @csrf
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">
                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-12">
                                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                                        <label for="name"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <input id="name" name="name" type="text"
                                                class="py-1.5 px-2 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                                required>
                                        </div>
                                        @error('name')
                                            <p class="text-xs text-red-500 font-italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center justify-end gap-x-6">
                                <div class="mt-6 flex items-center justify-end gap-x-2">
                                    <button class="close-modal" data-modal="modal1" type="button">Close</button>
                                </div>
                                <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal hidden" id="modal2" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <h1 class="text-lg font-bold">Modal 2 Title</h1>
                    <div class="mt-4">
                        <form action="/admin/programs/program/{{ $program->id }}/add_exercise" method="POST">
                            @csrf
                            <input type="hidden" name="program_schedule_id" id="program-schedule-id" value="">
                            @foreach ($exercises as $exercise)
                                <label>
                                    <input type="checkbox" name="exercise_ids[]" value="{{ $exercise->id }}"
                                        required>
                                    {{ $exercise->name }}
                                </label><br>
                            @endforeach
                            <button type="submit">Submit</button>
                        </form>

                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-2">
                        <button class="close-modal" data-modal="modal2" type="button">Close</button>
                    </div>
                </div>7
            </div>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal hidden" id="modal3" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-center justify-center p-4 text-center">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <h1 class="text-lg font-bold">Modal 3 Title</h1>
                    <div class="mt-4">
                        <p>Your content for Modal 3 goes here.</p>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-2">
                        <button class="close-modal" data-modal="modal3" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.open-modal').click(function() {
                const modalId = $(this).data('modal');
                $('#' + modalId).removeClass('hidden').addClass('block');
            });

            $('.close-modal').click(function() {
                const modalId = $(this).data('modal');
                $('#' + modalId).removeClass('block').addClass('hidden');
            });

            $(window).click(function(event) {
                $('.modal').each(function() {
                    if ($(event.target).is(this)) {
                        $(this).removeClass('block').addClass('hidden');
                    }
                });
            });

            $('#ScheduleForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                var programId = $('input[name="program_id"]').val();

                $.ajax({
                    type: 'POST',
                    url: `/admin/programs/program/${programId}`,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        $('#success-message').text(data.success).removeClass('hidden').fadeIn()
                            .delay(3000)
                            .fadeOut();
                        $('.close-modal[data-modal="modal1"]').trigger(
                            'click'); // Close the modal
                        location.reload();
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert("An error occurred: " + xhr.status + " " + xhr.statusText);
                    }
                });
            });

            document.querySelectorAll('.open-modal').forEach(button => {
                button.addEventListener('click', function() {
                    const modal = document.getElementById(this.dataset.modal);
                    const programId = this.dataset.id;
                    const programName = this.dataset.name;

                    // Populate modal fields
                    document.getElementById('program-schedule-id').value = programId;
                    document.getElementById('modal-program-name').textContent =
                        `Add Exercise to ${programName}`;

                    // Show modal
                    modal.classList.remove('hidden');
                });
            });

        });
    </script>



</x-app-layout>
