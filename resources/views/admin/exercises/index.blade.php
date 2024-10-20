<x-app-layout>

    <div class="overflow-hidden bg-white shadow sm:rounded-lg h-40">
        <div class="px-4 py-5 sm:p-6">
            <div class=" flex items-end justify-between">
                <div>
                    <h2 class="text-xl font-bold ">Ecercises</h2>
                </div>
                <div class="px-4">
                    <a href="/admin/exercises/create" class="inline-block ">
                        <button type="button"
                            class="rounded-full bg-indigo-600 p-2 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"
                                data-slot="icon">
                                <path
                                    d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Be sure to use this with a layout container that is full-width on mobile -->


    @foreach ($exercises as $exercise)
        <div
            class="overflow-hidden bg-white shadow-sm hover:shadow-lg hover:scale-104 transition-transform duration-300 ease-in-out sm:rounded-lg mt-4">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-4 gap-4">
                    <div class="col-span-3 p-2">
                        <p class="font-bold text-lg">{{ $exercise->name }}</p>
                        <p class="text-sm mt-3">{{ $exercise->description }}</p>
                    </div>
                    <div class="col-span-1 flex items-center justify-center">
                        <img src="{{ asset('storage/' . $exercise->photo_link) }}" alt="{{ $exercise->name }}"
                            class="w-16 h-16 rounded-full object-cover border border-gray-300">
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Pagination Links -->
    {{ $exercises->links() }}


</x-app-layout>
