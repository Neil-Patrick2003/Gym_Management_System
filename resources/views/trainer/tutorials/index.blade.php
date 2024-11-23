<x-trainer-layout>
    <div class="overflow-hidden rounded-lg mt-4 bg-white shadow">
        <div class="px-4 py-5 sm:p-6">
            <h3>Tutorials</h3>
        </div>
    </div>

    <div class="flex justify-end gap-4 mt-4">
        <button
            class="open-modal-btn rounded-md bg-yellow-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-yellow-400"
            data-target="myModal">
            Add Category
        </button>

        <!-- Trigger Button to Open Modal 2 (Another Action) -->
        <button
            class="open-modal-btn rounded-md bg-red-500 px-2.5 py-1.5 text-sm font-semibold text-white shadow-sm hover:bg-red-400"
            data-target="myModal2">
            Add Tutorials
        </button>
    </div>

    {{-- success message --}}
    @if (session('success'))
        <div class="alert alert-success text-green-500 p-4 mb-4 rounded border bg-green-100">
            {{ session('success') }}
        </div>
    @endif

    {{-- error message from validation --}}

    @error('category_name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
    @enderror


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
