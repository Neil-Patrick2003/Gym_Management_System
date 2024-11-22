<x-trainer-layout>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg h-40">
        <div class="px-4 py-5 sm:p-6">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-bold">Exercises</h2>
            </div>
        </div>
    </div>

    <div class="flex justify-center pt-2">
        <a href="/admin/exercises/create"
            class=" inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-600 to-red-600 text-white font-semibold rounded-full shadow-lg hover:shadow-xl transform transition-all hover:scale-105">
            <i class="fas fa-plus me-2"></i> Add Exercise
        </a>
    </div>

    @foreach ($exercises as $exercise)
        <div class="exercise-item overflow-hidden bg-white shadow-sm hover:shadow-lg hover:scale-104 transition-transform duration-300 ease-in-out sm:rounded-lg mt-4 p-4">
            <div class="action-buttons mt-2 flex justify-end" style="display: none;">
                <button class="edit-button bg-blue-500 text-white px-3 py-1 rounded mr-2">Edit</button>
                <button class="delete-button bg-red-500 text-white px-3 py-1 rounded">Delete</button>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="font-bold text-xl">{{ $exercise->name }}</p>
                </div>
                <img src="{{ asset('storage/' . $exercise->photo_link) }}" alt="{{ $exercise->name }}"
                    class="w-16 h-16 rounded-full object-cover border border-gray-300">
            </div>
        </div>

</x-trainer-layout>
