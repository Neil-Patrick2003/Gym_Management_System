<x-app-layout>
    <div class="divide-y divide-gray-200 overflow-hidden rounded-lg bg-white shadow">
        <div class="px-4 py-5 sm:px-6">
            <!-- Content goes here -->
            Add New Exercise
        </div>


        <div class="px-4 py-5 sm:p-6 ">
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Exercise Name</label>
                <div class="mt-2 w-1/2">
                    <input type="text" name="name" id="name"
                        class="block w-full rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="example">
                </div>
                <div class="w-full max-w-sm min-w-[200px]">
                    <label class="block mb-1 text-sm text-slate-600">
                        Input Number
                    </label>

                    <div class="relative">
                        <select
                            class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow cursor-pointer appearance-none">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2"
                            stroke="currentColor" class="h-5 w-5 ml-1 absolute top-2.5 right-2.5 text-slate-700">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </div>
                </div>

            </div>
            <div class="mt-2 w-1/2">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Exercise Name</label>
                <div class="mt-2">
                    <input type="text" name="name" id="name"
                        class="block w-full rounded-md border-0 px-4 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="example">
                </div>
            </div>
        </div>

    </div>


</x-app-layout>
