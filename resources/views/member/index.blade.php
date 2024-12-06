<x-member-layout>


    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="col-span-3 gap-y-4">
            <div class="overflow-hidden">
                <div class="h-36 bg-none border bg-center rounded-lg w-full p-4 mb-4"
                    style="background-image: url('{{ asset('images/final.1.png') }}');">
                    <div class="flex flex-row space-between text-neutral-100 h-full">
                        <div class="flex-col">
                            <h1 class="text-xl text-neutral-50 font-bold">Keep on Track on your journey</h1>
                            <p>"SASHSJFBSHFG.."</p>
                        </div>
                        <div>
                            <img src="{{ asset('images/header-bg.png') }}" alt="" class="h-32 w-56 object-cover">
                        </div>

                    </div>
                </div>


            </div>
            <div class="flex flex-row space-between w-full gap-x-4 mb-4">

                <!-- Cards Section -->
                <div class="flex flex-row justify-between w-full gap-x-4 mb-4">
                    <!-- Card 1 -->
                    <div class="overflow-hidden border rounded-lg bg-white shadow">
                        <div class="flex flex-col items-center p-6">
                            <div
                                class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                                <!-- Icon -->
                                <img src="{{ asset('images/icon-modern-equipment.png') }}" alt="Modern Equipment Icon"
                                    class="w-8 h-8">
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">MODERN EQUIPMENTS
                            </h3>
                            <p class="text-gray-600 text-center" style="font-size: 20px;">
                                Our state-of-the-art gym equipment ensures a safe, effective, and modern workout
                                experience.
                            </p>
                            </p>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="overflow-hidden border rounded-lg bg-white shadow">
                        <div class="flex flex-col items-center p-6">
                            <div
                                class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                                <!-- Icon -->
                                <img src="{{ asset('images/icon-nutrition-plan.png') }}" alt="Nutrition Plan Icon"
                                    class="w-8 h-8">
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">NUTRITION PLAN
                            </h3>
                            <p class="text-gray-600 text-center" style="font-size: 20px;">
                                Personalized meal plans tailored to meet your health goals and dietary preferences.
                            </p>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="overflow-hidden border rounded-lg bg-white shadow">
                        <div class="flex flex-col items-center p-6">
                            <div
                                class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                                <!-- Icon -->
                                <img src="{{ asset('D:\Gym Management Sytem\Gym_Management_System-1\public\gym.png') }}"
                                    alt="Personal Program Icon" class="w-9 h-8">
                            </div>
                            <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">PERSONAL PROGRAM
                            </h3>
                            <p class="text-gray-600 text-center" style="font-size: 20px;">
                                Customized training programs designed to match your fitness level and objectives.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <div class="border overflow-hidden rounded-lg bg-white shadow">
                <div class="px-4 py-5 sm:p-6">
                    <!-- Content goes here -->
                </div>
            </div>
        </div>

    </div>
    <div class="overflow-hidden border rounded-lg bg-white w-full shadow">
        <div class="px-4 py-5 sm:p-6">
            <div>
                <H3 class=" text-lg font-bold text-gray-600">Today Logs</H3>
            </div>

            <ul>
                @foreach ($totay_logs as $log)
                    <li>
                        Start: {{ $log->start_time }}
                        End: {{ $log->end_time }}
                        Trainer: {{ $log->trainer?->name }}
                        Duration: {{ $log->difference }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    </div>




    <div class="flex justify-between mx-4 w-full border shadow-md mt-6">
        <div>
            <H3 class=" text-lg font-bold text-gray-600">Programs</H3>
        </div>
        <div>
            <a href="/member/programs" class="text-sm text-gray-600">
                See all.
            </a>
        </div>

        <div class="snap-x flex overflow-x-auto space-x-4 py-4 mx-4 scrollbar-none">
            @foreach ($programs as $program)
                <div class="snap-center flex-shrink-0 w-80 h-62">
                    <img src="{{ asset('storage/' . $program->photo_link) }}" alt="Program Image"
                        class="w-full h-auto rounded-lg" />
                </div>
            @endforeach


        </div>
    </div>




    <!-- Fixed Check-in Button -->
    <div class="fixed bottom-4 right-4 z-50" x-data="{ modalOpen: false }">

        <x-timesheet-modal :show="'modalOpen'" :onClose="'modalOpen = false'" :currentTimesheet="$current_timesheet" :trainers="$trainers" />

        <button id="openModal" @click="modalOpen = true;"
            class="inline-flex items-center justify-center bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-500 transition-all">
            {{ $current_timesheet ? 'View timesheet' : 'Checkin' }}
        </button>
    </div>

</x-member-layout>
