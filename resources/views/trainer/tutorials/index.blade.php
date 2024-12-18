<x-trainer-layout>
    <div class="overflow-hidden rounded-lg mt-4 bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <h3>Tutorials</h3>
        </div>
    </div>

    {{-- add category && post tutorial --}}
    <div class="flex justify-end gap-4 my-4">
        {{-- category --}}
        <form action="/trainer/tutorials" method="get">
            <select name="category" onchange="this.form.submit()" class="p-2 border rounded">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </form>

        <button
            class="open-modal-btn bg-transparent hover:bg-red-500 text-red-600 hover:text-white border border-red-500 font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out"
            data-target="myModal">
            <svg class="w-[24px] h-[24px] text-red-500 hover:text-red mr-1.5" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                    clip-rule="evenodd" />
            </svg>
        </button>

        <button
            class="open-modal-btn bg-red-500 hover:bg-red-600 text-white border border-red-500 font-bold py-2 px-4 rounded inline-flex items-center transition duration-300 ease-in-out"
            data-target="myModal2">
            <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white mr-1.5" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                    clip-rule="evenodd" />
            </svg>
            <span>Upload Tutorials</span>
        </button>
    </div>

    {{-- success message --}}
    @if (session('success'))
        <div class="alert alert-success text-green-500 p-4 mb-4 rounded border bg-green-100">
            {{ session('success') }}
        </div>
    @endif
    {{-- error message --}}
    @error('category_name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror

    <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
        @foreach ($tutorials as $tutorial)
            <li class="relative">
                <div
                    class="group overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                    <!-- Pass the video link dynamically to the modal component -->
                    <x-video-modal :video-url="$tutorial->tutorial_links" />
                </div>
                <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">
                    {{ $tutorial->title }}
                </p>
                <p class="pointer-events-none block text-sm font-medium text-gray-500">
                    {{ $tutorial->description }}
                </p>
            </li>
        @endforeach
    </ul>





    <!-- Modal 1 (Add Category) -->
    <div id="myModal"
        class="fixed inset-0 bg-gray-500/75 flex items-center justify-center hidden transform transition-transform duration-200 scale-95">
        <div class="relative z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

                    {{-- modal content --}}
                    <form class="w-full max-w-sm" action="/trainer/tutorials/add_category" method="POST">
                        @csrf
                        <div class="flex items-center border-b border-teal-500 py-2 gap-2">
                            <input
                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                type="text" placeholder="Shoulder" name="name" aria-label="Full name">
                            <button
                                class="close-modal-btn text-red-500 border border-red-600 rounded bsolute px-1.5 py-1.5 top-2 right-2 "
                                data-target="myModal">
                                Cancel
                            </button>
                            <button
                                class="flex-shrink-0 bg-red-500 hover:bg-red-600 border-red-500 hover:border-red-700 text-sm border-4 text-white py-1.5 px-2 rounded"
                                type="submit">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 (Upload Tutorials) -->

    <div id="myModal"
        class="fixed inset-0 bg-gray-500/75 flex items-center justify-center hidden transform transition-transform duration-200 scale-95">
        <div class="relative z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">

                    {{-- modal content --}}
                    <form class="w-full max-w-sm" action="/trainer/tutorials/add_category" method="POST">
                        @csrf
                        <div class="flex items-center border-b border-teal-500 py-2 gap-2">
                            <input
                                class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                                type="text" placeholder="Shoulder" name="name" aria-label="Full name">
                            <button
                                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded"
                                type="submit">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>








    <div id="myModal2" class="fixed inset-0 bg-gray-500/75 flex items-center justify-center hidden">
        <div class="relative z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transform transition-transform duration-200 scale-95 sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <button class="close-modal-btn" data-target="myModal2"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        &times;
                    </button>


                    <form class="max-w-sm mx-auto" action="/trainer/tutorials/create" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-neutral-500">
                                Title</label>
                            <input type="text" id="title" name="title"
                                class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>
                        <div class="mb-5">
                            <label for="description" class="block mb-2 text-sm font-medium text-neutral-500">
                                Description</label>
                            <textarea id="message" name="description" rows="4"
                                class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required>
                            </textarea>

                        </div>
                        <div class="mb-5">
                            <label for="link" class="block mb-2 text-sm font-medium text-neutral-500">Url
                                Link</label>
                            <input type="text" id="title" name="link"
                                class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required />
                        </div>

                        <div class="max-w-sm mx-auto mt-10">
                            <label for="email" class="block mb-2 text-sm font-medium text-neutral-500">Url
                                Link</label>
                            <select id="simple-select" name="category"
                                class="mt-1 block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit"
                            class="text-white w-full bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Upload</button>
                    </form>


                </div>
            </div>
        </div>
    </div>


    </div>










</x-trainer-layout>
