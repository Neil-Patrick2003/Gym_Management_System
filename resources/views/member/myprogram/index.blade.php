<x-member-layout>My Working Programs
    <ul>
        @foreach ($user_programs as $user_program)
            <li>{{$user_program->program->name}}</li>
        @endforeach
    </ul>

</x-member-layout>
