<x-trainer-layout>

    <h1 class="p-4">
        All Programs
    </h1>
    @if (session('success'))
        <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <button type="button" onclick="document.getElementById('success-alert').style.display='none'">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a1 1 0 00-1.414 0L10 8.586 7.066 5.652a1 1 0 10-1.414 1.414L8.586 10l-2.934 2.934a1 1 0 001.414 1.414L10 11.414l2.934 2.934a1 1 0 001.414-1.414L11.414 10l2.934-2.934a1 1 0 000-1.414z" />
                    </svg>
                </button>
            </span>
        </div>
    @endif
    @foreach ($programs as $program)
        <a href="/trainer/programs/{{ $program->id }}" class="text-white text-lg font-normal hover:underline">
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
                        haaaa
                        <h2 class="text-white text-2xl sm:text-4xl md:text-6xl font-bold">{{ $program->level }}</h2>

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




    <button onclick="openModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md">
        Open Modal
    </button>

    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="myModal">
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 w-full text-center sm:ml-4 sm:mt-0 sm:text-left">
                            <h3 class="text-base font-semibold text-gray-900" id="modal-title">Create Program</h3>
                            <form action="/trainer/programs/create" method="POST" enctype="multipart/form-data"
                                class="w-full mt-4">
                                @csrf

                                <input type="hidden" name="created_by" value="{{ Auth::user()->name }}">

                                <div class="flex flex-col">
                                    <label for="name" class="mb-2 text-base font-semibold text-gray-600">Program
                                        Name</label>
                                    <input type="text" id="name" name="name"
                                        class="w-full h-12 px-4 text-sm border border-gray-300 rounded-lg bg-white focus:bg-gray-50 hover:border-gray-400 focus:border-indigo-500 focus:outline-none transition duration-200"
                                        placeholder="Enter program name" required />
                                </div>

                                <div>
                                    <label for="location"
                                        class="block text-sm/6 font-medium text-gray-900">Level</label>
                                    <div class="mt-2 grid grid-cols-1">
                                        <select id="location" name="level"
                                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                            <option value="Biginner">Biginner</option>
                                            <option value="Intermidiate">Intermidiate</option>
                                            <option value="Advance">Advance</option>
                                        </select>
                                        <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                            viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
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
                                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                    <button type="submit"
                                        class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Cancel</button>
                                    <button onclick="closeModal()" type="button"
                                        class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{--
    <div id="myModal" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg shadow-lg w-1/3 p-6">
            <h2 class="text-xl font-semibold mb-4">Modal Title</h2>
            <p class="mb-4">This is a simple modal. You can add any content here!</p>

            <!-- Close Button -->
            <button onclick="closeModal()" class="bg-red-500 text-red-900 px-4 py-2 rounded-md">
                Close
            </button>
        </div>
    </div> --}}






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

        function openModal() {
            document.getElementById('myModal').classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById('myModal').classList.add('hidden');
        }
    </script>

</x-trainer-layout>
