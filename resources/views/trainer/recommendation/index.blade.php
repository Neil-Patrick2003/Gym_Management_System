<x-trainer-layout>

    <div class="px-6 py-8 bg-gray-700 sm:px-8 rounded-lg shadow-lg">
        <h1 class="text-white text-2xl font-semibold mb-4">Write a Member Recommendation</h1>
        <p class="text-gray-300 text-lg">Welcome to our community space! Here, you can share your valuable thoughts and
            experiences about our members. Writing a recommendation not only helps highlight someone's strengths but
            also contributes to building a stronger, more supportive network.</p>
    </div>



    <ul role="list" class="divide-y mt-4 divide-gray-100 overflow-hidden bg-white border shadow-sm sm:rounded-xl">
        @foreach ($members as $member)
            <li class="relative flex justify-between gap-x-6 px-4 py-5 hover:bg-gray-50 sm:px-6">
                <div class="flex min-w-0 gap-x-4">
                    <img class="size-12 flex-none rounded-full bg-gray-50"
                        src="{{ asset('storage/' . $member->photo_url) }}" alt="">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm/6 font-semibold text-gray-900">
                            {{ $member->name }}
                        </p>
                        <p class="mt-1 flex text-xs/5 text-gray-500">
                            {{ $member->email }}
                        </p>
                    </div>
                </div>
                <div class="flex shrink-0 items-center gap-x-4">
                    <a href="/trainer/recommendations/create/{{ $member->id }}"
                        class="hidden rounded-md bg-gradient-to-r from-red-500 to-orange-500 px-2.5 py-1.5 text-sm font-semibold text-gray-200 shadow-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:block">Write
                        Recommendation
                        <span class="sr-only">, GraphQL API</span></a>
                </div>
            </li>
        @endforeach
    </ul>



</x-trainer-layout>
