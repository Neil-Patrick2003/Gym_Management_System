<x-member-layout>
    <div class="relative border border-white rounded-lg mb-4 overflow-hidden"
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
                <h2 class="text-white text-xl font-bold">{{ $user_program->completion_percentage ?? 0 }}%</h2>
            </div>
        </div>
    </div>

    @foreach ($user_program->program_schedules as $program_schedule)
        <div class="rounded-lg bg-white shadow mb-2">
            <div class="flex justify-between px-4 py-5 sm:px-6">
                <h1>{{ $program_schedule->name }}</h1>
                <a href="/member/myprogram/program/schedules/{{$program_schedule->id}}/daily-exercises">Start</a>
            </div>
        </div>
    @endforeach

</x-member-layout>
