<x-member-layout>
    <!-- Grid Layout -->
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Main Content -->
        <div class="col-span-3 gap-y-4">
            <!-- Header Section -->
            <div class="overflow-hidden">
                <div class="h-36 bg-none border bg-center rounded-lg w-full p-4 mb-4"
                     style="background-image: url('{{ asset('images/final.1.png') }}');">
                    <div class="flex flex-row justify-between text-neutral-100 h-full">
                        <div class="flex-col">
                            <h1 class="text-4xl text-neutral-50 font-bold" style="font-family: 'Trebuchet MS', sans-serif;">
                                Keep on Track on your journey
                            </h1>
                            <br>
                            <p>
                                The only limit to our realization of tomorrow is our doubts of today. Keep moving forward with determination and focus.
                            </p>
                        </div>
                        <div>
                            <img src="{{ asset('images/header-bg.png') }}" alt="Header Image" class="h-32 w-56 object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cards Section -->
            <div class="flex flex-row justify-between w-full gap-x-4 mb-4">
                <!-- Card 1 -->
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="flex flex-col items-center p-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                            <!-- Icon -->
                            <img src="{{ asset('images/icon-modern-equipment.png') }}" alt="Modern Equipment Icon" class="w-8 h-8">
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">MODERN EQUIPMENTS</h3>
                        <p class="text-gray-600 text-center" style="font-size: 20px;">
                        Our state-of-the-art gym equipment ensures a safe, effective, and modern workout experience.
                        </p>
                        </p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="flex flex-col items-center p-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                            <!-- Icon -->
                            <img src="{{ asset('images/icon-nutrition-plan.png') }}" alt="Nutrition Plan Icon" class="w-8 h-8">
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">NUTRITION PLAN</h3>
                        <p class="text-gray-600 text-center" style="font-size: 20px;">
                        Personalized meal plans tailored to meet your health goals and dietary preferences.
                        </p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="flex flex-col items-center p-6">
                        <div class="w-16 h-16 rounded-full bg-gradient-to-r from-red-500 to-orange-500 flex items-center justify-center mb-4">
                            <!-- Icon -->
                            <img src="{{ asset('D:\Gym Management Sytem\Gym_Management_System-1\public\gym.png') }}" alt="Personal Program Icon" class="w-9 h-8">
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 mb-2" style="font-size: 20px;">PERSONAL PROGRAM</h3>
                        <p class="text-gray-600 text-center" style="font-size: 20px;">
                            Customized training programs designed to match your fitness level and objectives.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="overflow-hidden rounded-lg bg-white w-full shadow">
            <div class="px-4 py-5 sm:p-6">
                <h2 class="text-lg font-semibold">Today's Schedules</h2>
                <p class="text-gray-600">No schedules available.</p>
            </div>
        </div>
    </div>

    <!-- Programs Section -->
    <div class="flex justify-between w-full border-t mt-6 pt-4">
        <h3 class="text-lg font-bold text-gray-600">Programs</h3>
        <a href="/member/programs" class="text-sm text-gray-600">See all</a>
    </div>
    <div class="snap-x flex overflow-x-auto space-x-4 py-4 scrollbar-none">
        @foreach ($programs as $program)
            <div class="snap-center flex-shrink-0 w-80">
                <img src="{{ asset('storage/' . $program->photo_link) }}" alt="Program Image" class="w-full h-auto rounded-lg" />
            </div>
        @endforeach
    </div>

    <!-- Fixed Check-in Button -->
    <div class="fixed bottom-4 right-4 z-50">
    <button id="openModal" class="inline-flex items-center justify-center bg-gradient-to-r from-red-500 to-orange-500 text-white px-6 py-3 rounded-lg shadow-lg hover:from-red-400 hover:to-orange-400 transition-all">
    Check in
</button>
        </button>
    </div>

    <!-- Modal Select Trainers -->
<div id="myModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-2/3 max-w-lg">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Choose Trainer</h2>
            <button id="closeModal" class="text-gray-600 text-2xl">&times;</button>
        </div>
        <div class="modal-body max-h-96 overflow-y-auto mt-4">
            <div class="flex space-x-4 overflow-x-auto p-4 hide-scroll-bar justify-center"> <!-- Centering the buttons -->
                <button type="button" class="h-40 flex-shrink-0 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg p-4 w-40 text-center font-semibold focus:outline-none">
                    <!-- Add an Icon or Image inside the button -->
                    <img src="{{ asset('images/none-icon.png') }}" alt="None" class="w-10 h-10 mx-auto mb-2">
                    None
                </button>
                @foreach ($trainers as $trainer)
                    <form action="/home" method="POST">
                        @csrf
                        <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                        <button type="submit" class="h-40 flex-shrink-0 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg p-4 w-40 text-center font-semibold focus:outline-none">
                            <!-- Add Trainer's Image/Icon inside the button -->
                            <img src="{{ asset('images/' . $trainer->image) }}" alt="{{ $trainer->name }}" class="w-10 h-10 mx-auto mb-2">
                            {{ $trainer->name }}
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>



    <!-- Modal Script -->
    <script>
        const modal = document.getElementById("myModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");

        openModalBtn.onclick = () => modal.classList.remove("hidden");
        closeModalBtn.onclick = () => modal.classList.add("hidden");

        window.onclick = (event) => {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
        };
    </script>
</x-member-layout>
