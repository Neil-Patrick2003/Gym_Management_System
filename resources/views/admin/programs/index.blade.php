<x-app-layout>
    <h1 class="p-4">
        All Programs
    </h1>

    @foreach ($programs as $program)
        <a href="/admin/programs/{{ $program->id }}" class="text-white text-lg font-normal hover:underline">
            <div class="relative border border-gray-300 rounded-lg mb-4 overflow-hidden"
                style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 200px;
                border-radius: 15px;
                opacity: 98%;">

                <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
                    <div>
                        <h2 class="text-white text-2xl sm:text-4xl md:text-6xl font-bold">{{ $program->name }}</h2>
                        <p class="text-white text-sm sm:text-base md:text-lg">Created by: {{ $program->created_by }}</p>

                    </div>
                    <div>
                        <p class="text-white text-sm sm:text-base md:text-lg opacity-60">view</p>
                    </div>
                    {{-- <div>
                        <form action="/admin/programs/delete/{{ $program->id }}" method="POST"
                            onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="program_id" value="{{ $program->id }}">
                            <button
                                class="bg-red-500 hover:bg-red-600 text-white text-sm font-semibold py-1 px-3 rounded">
                                Remove
                            </button>
                        </form>

                    </div> --}}
                </div>
            </div>
        </a>
    @endforeach

    <div>
        {{ $programs->links() }}
    </div>

    <div class="overflow-hidden rounded-lg bg-white shadow-lg mb-8">
        <div class="px-6 py-8 sm:p-10">

            <form action="/admin/programs" method="POST" enctype="multipart/form-data"
                class="space-y-8 max-w-lg mx-auto p-6 bg-gray-50 rounded-lg shadow-sm">
                @csrf

                <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">

                <div class="flex flex-col">
                    <label for="name" class="mb-2 text-base font-semibold text-gray-600">Program Name</label>
                    <input type="text" id="name" name="name"
                        class="w-full h-12 px-4 text-sm border border-gray-300 rounded-lg bg-white focus:bg-gray-50 hover:border-gray-400 focus:border-indigo-500 focus:outline-none transition duration-200"
                        placeholder="Enter program name" required />
                </div>

                <div class="flex flex-col">
                    <label class="block mt-2" for="photo_link_file">
                        <span class="sr-only">Choose Exercise photo</span>
                        <input type="file" name="photo_link" id="photo_link_file" required
                            class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-violet-50 file:text-violet-700
                                hover:file:bg-violet-100" />
                    </label>

                </div>












                <div class="flex justify-center">
                    <button type="submit"
                        class="w-full h-12 bg-indigo-600 text-white font-semibold rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 transition duration-200">
                        Add Program
                    </button>
                </div>
            </form>
        </div>
    </div>









    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scroll-bar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        function confirmDelete() {
            return confirm('Are you sure want to remove this program?');
        }
    </script>

</x-app-layout>
