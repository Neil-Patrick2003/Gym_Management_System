<x-member-layout>

    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="col-span-3 gap-y-4">
            <div class="overflow-hidden">
                <div class="h-36 bg-none border bg-center rounded-lg w-full p-4 mb-4"
                    style="background-image: url('{{ asset('images/final.1.png') }}');">
                    <div class="flex flex-row space-between text-neutral-100 h-full">
                        <div class="flex-col">
                            <h1 class="text-xl text-neutral-50 font-bold">Keep on Track on your journey</h1>
                            <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit..."</p>
                        </div>
                        <div>
                            <img src="{{ asset('images/header-bg.png') }}" alt="" class="h-32 w-56 object-cover">
                        </div>

                    </div>
                </div>


            </div>
            <div class="flex flex-row space-between w-full gap-x-4 mb-4">
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6">
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6 h-72">

                    </div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6">

                    </div>
                </div>
            </div>
            <div>
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                    </div>
                </div>
            </div>

        </div>
        <div class="overflow-hidden rounded-lg bg-white w-full shadow">
            <div class="px-4 py-5 sm:p-6">
                Today Schedules
            </div>
        </div>

    </div>

    <div class="">
        <div>
            <H3 class=" text-lg font-bold text-gray-600">Today Logs</H3>
        </div>

        <ul>
            @foreach($totay_logs as $log)
                <li>
                    Start: {{$log->start_time}}
                    End: {{$log->end_time}}
                    Trainer: {{$log->trainer?->name}}
                    Duration: {{$log->difference}}
                </li>
            @endforeach
        </ul>
    </div>


    <div class="flex justify-between w-full border mt-6">
        <div>
            <H3 class=" text-lg font-bold text-gray-600">Programs</H3>
        </div>
        <div>
            <a href="/member/programs" class="text-sm text-gray-600">
                See all.
            </a>
        </div>
    </div>
    <div class="snap-x flex overflow-x-auto space-x-4 py-4 scrollbar-none">
        @foreach ($programs as $program)
            <div class="snap-center flex-shrink-0 w-80">
                <img src="{{ asset('storage/' . $program->photo_link) }}" alt="Program Image"
                    class="w-full h-auto rounded-lg" />
            </div>
        @endforeach


    </div>








    <!-- Fixed Check-in Button -->
    <div class="fixed bottom-4 right-4 z-50" x-data="{ modalOpen: false }">

        <x-timesheet-modal :show="'modalOpen'" :onClose="'modalOpen = false'" :currentTimesheet="$current_timesheet" :trainers="$trainers"/>

        <button id="openModal"
            @click="modalOpen = true;"
            class="inline-flex items-center justify-center bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-500 transition-all">
            {{$current_timesheet ? 'View timesheet' : 'Checkin'}}
        </button>
    </div>


</x-member-layout>
