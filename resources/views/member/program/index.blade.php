<x-member-layout>
    <h1 class="mb-6">
        All Programs
    </h1>


    @foreach ($programs as $program)
        <a href="/member/programs/{{ $program->id }}">
            <div class="relative border border-gray-300 rounded-lg mb-4 overflow-hidden transform transition-all duration-300 ease-in-out hover:bg-white hover:bg-opacity-50 hover:scale-95 hover:shadow-lg"
                style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 200px;
                border-radius: 15px;
                opacity: 98%;">
                <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
                    <div>
                        <h2 class="text-white text-xl font-bold">{{ $program->name }}</h2>
                        <p class="text-white">Created by: {{ $program->created_by }}</p>
                    </div>
                    <div>
                        <label class="text-white text-sm">Tap to view.</label>
                    </div>
                </div>

            </div>
        </a>
    @endforeach

    <div>
        {{ $programs->links() }}
    </div>

</x-member-layout>
