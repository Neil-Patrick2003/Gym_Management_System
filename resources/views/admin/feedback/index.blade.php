<x-app-layout>
    <!-- Section Header -->
    <div class="py-6 px-4 sm:px-6 lg:px-8 bg-red-600 rounded rounded-lg">
        <h2 class="text-2xl font-semibold text-white">User Feedback</h2>
        <p class="mt-2 text-lg text-gray-200">Here's what our users are saying. We value their thoughts and use this
            feedback to improve our services.</p>
    </div>

    <div class="grid grid-cols-2 mt-4 gap-4">
        @foreach ($feedbacks as $feedback)
            <div class="rounded-xl bg-white p-6 text-center border border-red-600 shadow-lg">
                <center>
                    <h1 class="text-darken mb-3 text-lg font-medium lg:px-14">{{ $feedback->content }}</h1>
                    <p class="px-4 text-gray-500 text-sm">{{ $feedback->user->name }}</p>
                </center>
            </div>
        @endforeach
    </div>

</x-app-layout>
