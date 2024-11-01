<x-app-layout>
    <h1 class="mb-6">
        All Programs
    </h1>






    @foreach ($programs as $program)
        <div class="relative border border-gray-300 rounded-lg mb-4 overflow-hidden"
            style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 200px;
                border-radius: 15px;
                opacity: 98%;">

            <!-- Optional Overlay and Content -->
            <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
                <div>
                    <h2 class="text-white text-xl font-bold">{{ $program->name }}</h2>
                    <p class="text-white">Created by: {{ $program->created_by }}</p>
                </div>
                <div>
                    <a href="/admin/programs/{{$program->id}}" class="text-white text-lg font-normal hover:underline">View></a>
                    {{-- <a href="/admin/programs/{programId}/daily-exercises/{daily-exercise-id}" class="text-white text-lg font-normal hover:underline">View></a> --}}
                </div>
            </div>

        </div>
    @endforeach

    <div>
        {{ $programs->links() }}
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow mb-6">
        <div class="px-4 py-5 sm:p-6">

            <form action="/admin/programs" method="POST" enctype="multipart/form-data"
                class="space-y-6 max-w-lg mx-auto p-4">
                @csrf

                <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">
                <div class="flex flex-col">
                    <label for="name" class="mb-1 text-sm font-medium text-gray-500">Name</label>
                    <input type="text" id="username" name="name"
                        class="w-full h-12 px-4 py-2 text-sm border border-gray-300 rounded-md bg-gray-50 hover:border-gray-500 focus:outline-none focus:border-indigo-600 duration-200"
                        placeholder="Enter program name" />
                </div>


                <div class="flex flex-col">
                    <label for="photo_link" class="mb-1 text-sm font-medium text-gray-500">Upload File</label>
                    <input id="photo_link" name="photo_link" type="file"
                        class="w-full h-12 px-4 py-2 text-sm border border-gray-300 rounded-md bg-gray-50 cursor-pointer hover:border-gray-500 focus:outline-none focus:border-indigo-600 duration-200" />
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full h-12 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>










</x-app-layout>
