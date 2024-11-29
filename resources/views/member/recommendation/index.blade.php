<x-member-layout>

    <div class="max-w-full mx-auto bg-white rounded-lg">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200">
            <nav class="flex space-x-4 p-4">
                <button id="supplement-tab" onclick="switchTab('supplement')"
                    class="tab-button px-4 py-2 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:text-red-600">
                    Supplement Recommendations
                </button>
                <button id="food-tab" onclick="switchTab('food')"
                    class="tab-button px-4 py-2 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:text-red-600">
                    Food Recommendations
                </button>
            </nav>
        </div>

        <!-- Tabs Content -->
        <div class="p-6">
            <div id="supplement" class="tab-content">
                @if ($supplement_recommendations->count() === 0)
                    <div class="mt-6 text-center text-gray-700">
                        <p class="text-lg font-semibold">No recommendations available at the moment.</p>
                        <p class="mt-2 text-sm">Stay healthy and keep pushing forward!</p>
                        <p class="mt-4 italic">"Your body deserves the best—supplements can help, but a balanced diet
                            and hard work make all the difference."</p>
                    </div>
                @else
                    <h2 class="text-lg font-semibold text-gray-800">Supplement Recommendations</h2>
                    <p class="mt-2 text-gray-600 mb-4">Here are some recommended supplements for your fitness goals:</p>
                    @foreach ($supplement_recommendations as $supplement_recommendation)
                        @if ($recommendation->type == 'Food Recommendation')
                            <ul role="list" class="space-y-3 mb-2">
                                <li class="overflow-hidden bg-white px-4 py-4 shadow sm:rounded-md sm:px-6">
                                    From {{ $supplement_recommendations->trainer->name }}
                                    <ul class="mt-4 list-disc list-inside space-y-2">
                                        <li>{{ $supplement_recommendations->content }}</li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                @endif
            </div>

            <!-- Food Recommendations Content -->
            <div id="food" class="tab-content hidden">
                @if ($food_recommendations->count() === 0)
                    <div class="mt-6 text-center text-gray-700">
                        <p class="text-lg font-semibold">No recommendations available at the moment.</p>
                        <p class="mt-2 text-sm">Stay healthy and keep pushing forward!</p>
                        <p class="mt-4 italic">"Real food gives you real energy—choose wisely, feel the difference."</p>
                    </div>
                @else
                    <h2 class="text-lg font-semibold text-gray-800">Supplement Recommendations</h2>
                    <p class="mt-2 text-gray-600 mb-4">Here are some recommended supplements for your fitness goals:</p>
                    @foreach ($food_recommendations as $food_recommendation)
                        @if ($recommendation->type == 'Food Recommendation')
                            <ul role="list" class="space-y-3 mb-2">
                                <li class="overflow-hidden bg-white px-4 py-4 shadow sm:rounded-md sm:px-6">
                                    From {{ $food_recommendations->trainer->name }}
                                    <ul class="mt-4 list-disc list-inside space-y-2">
                                        <li>{{ $food_recommendations->content }}</li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tab contents
            const tabContents = document.querySelectorAll('.tab-content');
            tabContents.forEach(content => content.classList.add('hidden'));

            // Remove active state from all tab buttons
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.classList.remove('border-red-500', 'text-red-600', 'bg-red-100'); // Remove active styles
            });

            // Show the selected tab content and add active state to the button
            document.getElementById(tabName).classList.remove('hidden');
            const activeButton = document.getElementById(`${tabName}-tab`);
            activeButton.classList.add('border-red-500', 'text-red-600', 'bg-red-100'); // Add active styles
        }
    </script>

</x-member-layout>
