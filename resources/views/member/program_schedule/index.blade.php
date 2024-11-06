<x-member-layout>
    <div class="px-4 py-5 sm:px-6">
        <h1>{{ $program_schedule->name }}</h1>
    </div>
    <div class="px-4 py-5 sm:p-6">

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
                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-lg transition duration-200 ease-in-out">
                            Complete
                        </button>
                        
                    </div>
                </div>
                
            </div>
        @endforeach

    </div>
</x-member-layout>
