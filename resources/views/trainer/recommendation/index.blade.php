<x-trainer-layout>

    <div class="border border-solid shadow-md mt-4 bg-white rounded rounded-lg">
        <div class="mx-auto max-w-7xl">
            <div class=" py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
<<<<<<< HEAD

=======
                        
>>>>>>> origin/develop
                    </div>
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-700">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-800 sm:pl-0">
                                                Name</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800">
                                        @foreach ($members as $member)
                                            <tr>
                                                <td
                                                    class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-600 sm:pl-0">
                                                    {{$member->name}}</td>
                                                <td
                                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                                    <a href="/trainer/recommendations/create/{{$member->id}}"
                                                        class="text-indigo-400 hover:text-indigo-300">Add
                                                        Recommendations<span class="sr-only">, Lindsay Walton</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-trainer-layout>
