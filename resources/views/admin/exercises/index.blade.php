<x-app-layout>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg h-40">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Exercises</h2>


                <button id="global-toggle-button" onclick="toggleAllButtons()"
                    class="text-indigo-600">
                    Show All Actions
                </button>
            </div>
        </div>
    </div>

    @foreach ($exercises as $exercise)
        <div class="exercise-item overflow-hidden bg-white shadow-sm hover:shadow-lg hover:scale-104 transition-transform duration-300 ease-in-out sm:rounded-lg mt-4 p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-bold text-lg">{{ $exercise->name }}</p>
                    <p class="text-sm mt-3">{{ $exercise->description }}</p>
                </div>
                <img src="{{ asset('storage/' . $exercise->photo_link) }}" alt="{{ $exercise->name }}"
                    class="w-16 h-16 rounded-full object-cover border border-gray-300">
            </div>

            <div class="action-buttons mt-2" style="display: none;">
                <button class="edit-button bg-blue-500 text-white px-3 py-1 rounded mr-2">Edit</button>
                <button class="delete-button bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
        </div>
    @endforeach


    {{ $exercises->links() }}

    <script>
        function toggleAllButtons() {
            const actionButtons = document.querySelectorAll(".action-buttons");
            const toggleButton = document.getElementById("global-toggle-button");

            const isHidden = actionButtons[0].style.display === "none";

            actionButtons.forEach(buttonGroup => {
                buttonGroup.style.display = isHidden ? "block" : "none";
            });

            toggleButton.textContent = isHidden ? "Hide All Actions" : "Show All Actions";
        }
    </script>

</x-app-layout>
