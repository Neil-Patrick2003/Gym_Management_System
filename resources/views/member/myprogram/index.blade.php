<x-member-layout>
        <h1>My Working Programs</h1>
        @foreach ($user_programs as $user_program)
            <a href="/member/myprogram/{{ $user_program->id }}">
                <div class="relative border border-gray-300 rounded-lg mb-4 overflow-hidden"
                    style="background-image: url('{{ asset('storage/' . $user_program->program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 200px;
                border-radius: 15px;
                opacity: 98%;">
                    <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
                        <div>
                            <h2 class="text-white text-xl font-bold">{{ $user_program->program->name }}</h2>
                            <p class="text-white">Created by: {{ $user_program->program->created_by }}</p>
                        </div>
                        <div>
                            <label class="text-green-600 text-sm">In Progress</label>
                        </div>
                    </div>

                </div>
        @endforeach

</x-member-layout>
