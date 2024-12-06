<x-trainer-layout>
    <!-- Header Section -->
    <div class="overflow-hidden border mt-4 border-4 border-b-red-500 shadow-lg sm:rounded-lg">
        <div class="px-2 py-3 sm:p-4">
            @if (session('success'))
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="px-4 py-5 sm:p-6">
                <h1 class="text-3xl font-semibold text-gray-900">Create Recommendation</h1>
            </div>
        </div>
    </div>

    <!-- Member Info Section -->
    <div class="overflow-hidden mt-4 shadow-md sm:rounded-lg bg-gray-600">
        <div class="p-4 flex items-center">
            <div class="shrink-0">
                <img class="size-12 rounded-full border-4 border-red-500"
                    src="{{ asset('storage/' . $member->photo_url) }}" alt="">
            </div>
            <div class="ml-4">
                <h3 class="text-xl font-semibold text-gray-200">{{ $member->name }}</h3>
                <p class="text-sm text-gray-400">{{ $member->email }}</p>
            </div>
        </div>
    </div>

    <!-- Recommendation Form Section -->
    <div class="overflow-hidden mt-6 shadow-md sm:rounded-lg bg-white">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-4">
            <!-- Left Side (Empty) -->
            <div class="col-span-1 bg-gray-100 p-4">

                Recommendations
                <div class="col-span-1 bg-gray-100 p-4 max-h-64 overflow-y-auto">
                    @foreach ($recommendations as $recommendation)
                        <div
                            class="relative flex mt-2 items-center space-x-3 rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:border-gray-400">
                            <div class="min-w-0 flex-1">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">{{$recommendation->content}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

            <!-- Right Side (Form) -->
            <div class="col-span-2 bg-white border-2 border-gray-200 rounded-lg shadow-md p-6">
                <form action="/trainer/recommendations/create/{{ $member->id }}" method="POST">
                    @csrf
                    <!-- Category Select -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm  mb-1 font-medium text-gray-900">Type</label>
                        <select id="category" name="category"
                            class="mt-2 block w-full rounded-md border-2 border-gray-300 py-2 pl-3 pr-10 text-gray-900 focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <option>Suplement Recommendation</option>
                            <option selected>Food Recommendations</option>
                        </select>
                        @error('category')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Content Textarea -->
                    <div class="mb-4 ">
                        <label for="content" class="block text-sm font-medium mb-2 text-gray-900">Your message</label>
                        <textarea name="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 rounded-lg border-2 border-gray-300 focus:ring-2 focus:ring-red-500 transition-all duration-300"
                            placeholder="Write your recommendation here..." required></textarea>
                        @error('content')
                            <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center rounded-md bg-red-600 text-white px-5 py-2 text-sm font-semibold shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-300">
                            <svg class="-ml-0.5 mr-2 w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path
                                    d="M3 4a2 2 0 0 0-2 2v1.161l8.441 4.221a1.25 1.25 0 0 0 1.118 0L19 7.162V6a2 2 0 0 0-2-2H3Z" />
                                <path
                                    d="m19 8.839-7.77 3.885a2.75 2.75 0 0 1-2.46 0L1 8.839V14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8.839Z" />
                            </svg>
                            <span>Create</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-trainer-layout>
