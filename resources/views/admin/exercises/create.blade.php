<x-app-layout>

    <form action="/admin/exercises/create" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-semibold text-gray-900">Create New Exercise</h2>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 sm:grid-cols-4 gap-6">

                    @error('name')
                        <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
                    @enderror
                    @error('descriptionj')
                        <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
                    @enderror
                    <div class="col-span-4 sm:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-900">
                            Exercise Name
                        </label>
                        <input type="text" name="name" id="name" placeholder="Enter exercise name" required
                            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm" />

                        <label for="description" class="block mt-4 text-sm font-medium text-gray-900">
                            Description
                        </label>
                        <input type="text" name="description" id="description" placeholder="Enter description"
                            required
                            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm" />
                    </div>

                    @error('no_of_set')
                        <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
                    @enderror
                    @error('no_of_reps')
                        <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
                    @enderror
                    <div class="col-span-4 sm:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label for="no_of_set" class="block text-sm font-medium text-gray-900">
                                No. of Sets
                            </label>
                            <input type="number" name="no_of_sets" id="no_of_set" min="1" placeholder="e.g. 3"
                                required
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm" />
                        </div>
                        <div>
                            <label for="no_of_reps" class="block text-sm font-medium text-gray-900">
                                No. of Reps
                            </label>
                            <input type="number" name="no_of_reps" id="no_of_reps" min="1" placeholder="e.g. 10"
                                required
                                class="mt-2 block w-full rounded-md border-gray-300 shadow-sm px-4 py-2 text-gray-900 focus:border-indigo-500 focus:ring focus:ring-indigo-300 sm:text-sm" />
                        </div>
                    </div>
                </div>
            </div>

            @error('tutorial_video')
                <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
            @enderror
            @error('photo_link')
                <p class="text-xs text-red-500 font-italic mt-1">{{ $message }} </p>
            @enderror
            <div class="px-4 py-4 sm:px-6">
                <label for="tutorial_link" class="block text-sm font-medium text-gray-900 mt-3">
                    Demo
                </label>
                <label class="block mt-2" for="tutorial_link_file">
                    <span class="sr-only">Choose Tutorial videos</span>
                    <input type="file" name="tutorial_link" id="tutorial_link_file" required
                        class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100" />
                </label>
                <label for="photo_link" class="block text-sm font-medium text-gray-900 mt-3">
                    Photo Link
                </label>
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
        </div>
        <button type="submit"
            class="mt-4 w-full inline-flex items-center justify-center rounded-md bg-gradient-to-r from-yellow-600 to-red-600 text-white px-4 py-2 text-sm font-medium shadow-sm transition duration-300 ease-in-out hover:from-red-600 hover:to-yellow-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Create
        </button>
    </form>
</x-app-layout>
