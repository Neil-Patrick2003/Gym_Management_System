<x-trainer-layout>
    <div class="overflow-hidden rounded-lg mt-4 bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <h3>Tutorials</h3>
        </div>
    </div>

    {{-- add category && post tutorial --}}
    <div class="flex justify-end gap-4 my-4">
        {{-- category --}}
        <form action="/trainer/tutorials/filter" method="POST" id="filterForm">
            @csrf
            <select id="categories"  name="category_id"
                class="px-4 py-2 bg-white text-red-500 border border-red-500 rounded shadow-sm focus:ring-red-500 focus:border-red-500 hover:">
                <option value="All">All</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
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

            <span>Add Category</span>
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
        <li class="relative">
            <div
                class="group overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                    alt="" class="pointer-events-none aspect-[10/7] object-cover group-hover:opacity-75">
                <button type="button" class="absolute inset-0 focus:outline-none">
                    <span class="sr-only">View details for IMG_4985.HEIC</span>
                </button>
            </div>
            <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">IMG_4985.HEIC</p>
            <p class="pointer-events-none block text-sm font-medium text-gray-500">3.9 MB</p>
        </li>
        <li class="relative">
            <div
                class="group overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                    alt="" class="pointer-events-none aspect-[10/7] object-cover group-hover:opacity-75">
                <button type="button" class="absolute inset-0 focus:outline-none">
                    <span class="sr-only">View details for IMG_4985.HEIC</span>
                </button>
            </div>
            <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">IMG_4985.HEIC</p>
            <p class="pointer-events-none block text-sm font-medium text-gray-500">3.9 MB</p>
        </li>
        <li class="relative">
            <div
                class="group overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                    alt="" class="pointer-events-none aspect-[10/7] object-cover group-hover:opacity-75">
                <button type="button" class="absolute inset-0 focus:outline-none">
                    <span class="sr-only">View details for IMG_4985.HEIC</span>
                </button>
            </div>
            <p class="pointer-events-none mt-2 block truncate text-sm font-medium text-gray-900">IMG_4985.HEIC</p>
            <p class="pointer-events-none block text-sm font-medium text-gray-500">3.9 MB</p>
        </li>

        <!-- More files... -->
    </ul>



    <!-- Modal 1 (Add Category) -->
    <div id="myModal"
        class="fixed inset-0 bg-gray-500/75 flex items-center justify-center hidden transition duration-500  ease-out-in">
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
                            <button class="close-modal-btn" data-target="myModal"
                                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 (Another Action) -->
    <div id="myModal2" class="fixed inset-0 bg-gray-500/75 flex items-center justify-center hidden">
        <div class="relative z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div
                    class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <button class="close-modal-btn" data-target="myModal2"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                        &times;
                    </button>
                    {{-- content --}}
                    <form class="w-full max-w-sm">
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="title">
                                    Title
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name="title"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="description">
                                    Description
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name="description"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="link">
                                    Link
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input name="linl"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                    for="link">
                                    Link
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <select name="category" id="">
                                    <option value="">1</option>
                                    <option value="">1</option>
                                </select>
                            </div>
                        </div>


                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button
                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="button">
                                    Sign Up
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-trainer-layout>
