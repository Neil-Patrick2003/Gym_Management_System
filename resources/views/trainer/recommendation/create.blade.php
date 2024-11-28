<x-trainer-layout>
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4  py-5 sm:p-6">
            Write Recommendation to {{ $member->id }}
        </div>
    </div>

    <div class="overflow-hidden mt-2 rounded-lg bg-white shadow">
        <div class="px-4  py-5 sm:p-6">
            <form action="/trainer/recommendations/create/{{ $member->id }}"method="POST">
                @csrf
                <div>
                    <label for="location" class="block text-sm/6 font-medium mt-4 text-gray-900">Location</label>
                    <select id="category" name="category"
                        class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm/6">
                        <option>Suplement Recommendation</option>
                        <option selected>Food Recommmendations</option>
                    </select>
                    @error('category')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror

                    <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea name="content" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your recommendation here..." required></textarea>
                    @error('content')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                    @enderror
                    <center>
                        <button type="submit"
                            class="rounded bg-indigo-50 m-4 px-2 py-1 text-sm font-semibold text-indigo-600 shadow-sm hover:bg-indigo-100">
                            Create
                        </button>
                    </center>
                </div>
            </form>


        </div>
    </div>

    

</x-trainer-layout>
