<x-trainer-layout>
    <div class="overflow-hidden bg-white shadow sm:rounded-lg h-40 mb-4">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-2xl font-semibold text-gray-800">Exercises</h2>
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-2 mb-6">
        <a href="/trainer/exercises/create"
            class="inline-flex items-center px-6 py-3 bg-red-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
            <i class="fas fa-plus mr-2"></i> Add Exercise
        </a>
    </div>

    <!-- Loop through exercises and display each exercise -->
    @foreach ($exercises as $exercise)
        <div class="exercise-item overflow-hidden bg-white shadow-lg hover:shadow-2xl hover:scale-105 transition-all duration-300 ease-in-out sm:rounded-lg mt-4 p-4">
            <div class="flex justify-between items-center mb-4">
                <div>
                    <p class="font-bold text-xl text-gray-800">{{ $exercise->name }}</p>
                </div>
                <img src="{{ asset('storage/' . $exercise->photo_link) }}" alt="{{ $exercise->name }}"
                     class="w-16 h-16 rounded-full object-cover border-2 border-gray-300">
            </div>

            <div class="text-center">
                <!-- Use an anchor tag to open the modal with exercise details -->
                <a href="#exerciseModal-{{ $exercise->id }}" class="bg-indigo-600 hover:bg-indigo-500 text-white py-2 px-6 rounded-lg shadow-md transition-all duration-300">
                    Watch Demo
                </a>
            </div>
        </div>
    @endforeach

    <!-- Modal Structure for each exercise -->
    @foreach ($exercises as $exercise)
        <div id="exerciseModal-{{ $exercise->id }}" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50 text-slate-800 hidden">
            <div class="bg-white p-6 rounded-lg shadow-xl w-full max-w-3xl mx-auto">
                <!-- Modal Title -->
                <h2 class="text-2xl font-semibold mb-4 text-gray-800">{{ $exercise->name }}</h2>

                <!-- Video Player -->
                <div class="relative w-full pb-9/16 mb-6">
                    <video class="absolute inset-0 w-full h-full" controls>
                        <source src="{{ asset('storage/videos/tutorials/' . $exercise->video_link) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>

                <!-- Description -->
                <div class="text-gray-700">
                    <p class="text-sm font-medium leading-relaxed">{{ $exercise->description }}</p>
                </div>

                <!-- Close Modal Button -->
                <div class="flex justify-end mt-4">
                    <button type="button" class="bg-gray-300 text-gray-800 px-6 py-3 rounded-lg hover:bg-gray-400 transition-all duration-200"
                            onclick="document.getElementById('exerciseModal-{{ $exercise->id }}').classList.add('hidden');">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Script to handle modal visibility -->
    <script>
        // Open modal functionality
        document.querySelectorAll('a[href^="#exerciseModal-"]').forEach(link => {
            link.addEventListener('click', function() {
                const modalId = this.getAttribute('href').substr(1);
                document.getElementById(modalId).classList.remove('hidden');
            });
        });
    </script>

</x-trainer-layout>
