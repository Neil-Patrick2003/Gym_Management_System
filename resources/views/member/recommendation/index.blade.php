<x-member-layout>
    recommendation

    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg">
        <!-- Tabs Navigation -->
        <div class="border-b border-gray-200">
            <nav class="flex space-x-4 p-4">
                <button id="supplement-tab" onclick="switchTab('supplement')"
                    class="tab-button px-4 py-2 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:text-indigo-600">
                    Supplement Recommendations
                </button>
                <button id="food-tab" onclick="switchTab('food')"
                    class="tab-button px-4 py-2 text-sm font-medium text-gray-700 border-b-2 border-transparent hover:text-indigo-600">
                    Food Recommendations
                </button>
            </nav>
        </div>

        <!-- Tabs Content -->
        <div class="p-6">
            <!-- Supplement Recommendations Content -->
            <div id="supplement" class="tab-content">
                <h2 class="text-lg font-semibold text-gray-800">Supplement Recommendations</h2>
                <p class="mt-2 text-gray-600">Here are some recommended supplements for your fitness goals:</p>
                <ul class="mt-4 list-disc list-inside space-y-2">
                    <li>Protein Powder</li>
                    <li>Creatine</li>
                    <li>BCAA (Branched-Chain Amino Acids)</li>
                    <li>Fish Oil</li>
                    <li>Multivitamins</li>
                </ul>
            </div>

            <!-- Food Recommendations Content -->
            <div id="food" class="tab-content hidden">
                <h2 class="text-lg font-semibold text-gray-800">Food Recommendations</h2>
                <p class="mt-2 text-gray-600">Here are some food recommendations to support your healthy diet:</p>
                <ul class="mt-4 list-disc list-inside space-y-2">
                    <li>Grilled Chicken Breast</li>
                    <li>Brown Rice</li>
                    <li>Sweet Potatoes</li>
                    <li>Green Leafy Vegetables</li>
                    <li>Fruits (e.g., Berries, Apples, Bananas)</li>
                </ul>
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
            tabButtons.forEach(button => button.classList.remove('border-indigo-500', 'text-indigo-600'));

            // Show the selected tab content and add active state to the button
            document.getElementById(tabName).classList.remove('hidden');
            document.getElementById(`${tabName}-tab`).classList.add('border-indigo-500', 'text-indigo-600');
        }
    </script>

</x-member-layout>
