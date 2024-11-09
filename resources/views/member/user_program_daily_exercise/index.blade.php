<x-member-layout>
    <div class="px-4 py-5 sm:px-6">
        <h1>{{ $program_schedule->name }}</h1>
    </div>
    <div class="px-4 py-5 sm:p-6">
        @if (session()->has('success'))
            <div id="showOrHide"
                class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    A simple success alert with an <a href="#"
                        class="font-semibold underline hover:no-underline">example link</a>. Give it a click if you
                    like.
                </div>
                <button type="button" onclick="showOrHideDiv()"
                    class="ms-auto -mx-1.5 -my-1.5 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-border-3" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif


        @foreach ($program_schedule->exercises as $exercise)
            <div class="grid grid-cols-3 gap-4 border border-solid mb-4 p-4">
                <div class="flex">
                    <div class="w-16 h-16">
                        <img src="{{ asset('storage/' . $exercise->photo_link) }}" alt="{{ $exercise->name }}"
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
                <div class="flex content-center justify-between mt-6">
                    <p><span class="bg-red-300 px-2 rounded">No.sets: {{ $exercise->no_of_sets }}</span>
                    </p>
                    <div>
                        {{--
                        if daily exercise status is completed disable btn
                        enable btn
                        --}}

                        <form
                            action="/member/myprogram/program/schedules/{{ $program_schedule->id }}/daily-exercises/{{ $exercise->id }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="exercise_id" value="{{ $exercise->id }}">
                            <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out">
                                Complete
                            </button>
                        </form>


                    </div>
                </div>

            </div>
        @endforeach

    </div>


    <script>
        function showOrHideDiv() {
            var v = document.getElementById("showOrHide");
            if (v.style.display === "none") {
                v.style.display = "block";
            } else {
                v.style.display = "none";
            }
        }
    </script>
</x-member-layout>
