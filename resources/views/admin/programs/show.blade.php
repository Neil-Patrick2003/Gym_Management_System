<x-app-layout>
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

    @foreach ($program->program_schedules as $program_schedule)
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow mb-2">
            <div class="px-4 py-5 sm:px-6">
                <h1>{{ $program_schedule->name }}</h1>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <ul>
                    @foreach ($program_schedule->exercises as $exercise)
                        <li class="mb-2">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="flex">
                                    <div class="w-16 h-16">
                                        <img src="{{ asset('storage/' . $exercise->photo_link) }}"
                                            alt="{{ $exercise->name }}"
                                            class="w-12 h-12 mt-2 rounded-full object-cover border border-gray-300">
                                    </div>
                                    <div class="content-center">
                                        {{ $exercise->name }}
                                    </div>
                                </div>
                                <div class="content-center">
                                    <p><span class="bg-red-300 px-2 rounded">No.reps: {{ $exercise->no_of_reps }}</span>
                                    </p>
                                </div>
                                <div class="content-center">
                                    <p><span class="bg-red-300 px-2 rounded">No.sets: {{ $exercise->no_of_sets }}</span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="px-4 py-4 sm:px-6 flex justify-center">
                <button class="open-modal bg-green-500 text-white px-4 py-2 rounded" data-modal="modal2"
                    data-id="{{ $program_schedule->id }}" data-name="{{ $program_schedule->name }}">
                    Add Exercise
                </button>
            </div>
        </div>
    @endforeach

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
                                    <button class="close-modal border border-2 w-full" data-modal="modal1" type="button">Close</button>
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




    <!-- Modal 2 For add Exercises in daily Schedule -->
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
                                <div class="flex items-center justify-between border border-solid rounded p-3 mb-2">
                                    <div class="w-16 h-16 flex-shrink-0">
                                        <img src="{{ asset('storage/' . $exercise->photo_link) }}"
                                            alt="{{ $exercise->name }}"
                                            class="w-12 h-12 mt-2 rounded-full object-cover border border-gray-300">
                                    </div>
                                    <div class="flex-grow ms-4 text-sm font-medium">
                                        {{ $exercise->name }}
                                    </div>
                                    <div>
                                        <input type="checkbox" name="exercise_ids[]" value="{{ $exercise->id }}"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-full focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    </div>
                                </div>
                            @endforeach

                            <button type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Submit</button>
                        </form>

                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-2">
                        <button class="close-modal inline-flex w-full justify-center rounded-md  px-4 py-2 text-sm font-semibold shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" data-modal="modal2" type="button">Close</button>
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
