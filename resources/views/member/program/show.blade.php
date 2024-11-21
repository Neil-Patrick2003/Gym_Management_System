<x-member-layout>
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
        </div>
    @endforeach

    <div class="px-4 py-5 sm:p-2 mb-2">
        <form action="/member/programs/{{ $program->id }}" method="POST">
            @csrf
            <input type="hidden" name="program_id" value="{{ $program->id }}">
            <center>
                <button type="submit"
                    class="bg-gradient-to-r from-yellow-600 to-red-600 text-white px-6 py-3 rounded-full shadow-md hover:from-red-600 hover:to-yellow-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 min-w-[200px]">Start
                    workout</button>
            </center>
        </form>
    </div>
</x-member-layout>
