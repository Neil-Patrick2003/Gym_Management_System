<x-layout>

    <style>
        /* Custom background image for main content */
        .main-bg {
            background-image: url('images/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            width: 100vw;
            min-height: calc(100vh - 6rem);
            /* Adjusts height to prevent overlap, ensuring room for footer */
            margin: 0;
            padding: 0;
        }

        #calorie-calculator,
        #bmi-calculator {
            padding-bottom: 100px;
            /* Adds extra space at the bottom */
        }



        html,
        body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
            /* Prevents horizontal scroll */
            display: flex;
            flex-direction: column;
        }



        #calorieResults,
        #bmiResults {
            margin-bottom: 10px;
            /* Adds space from footer */
        }

        /* Card hover effect */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Fade-in effect */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Additional Styling for Cards */
        .card-container {
            display: flex;
            justify-content: space-around;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card.hidden {
            display: none;
        }

        #Footlong {
            background-color: black;
            color: white;
            margin: 0;
            margin-top: -86px;
            /* Adjust this value as needed */

        }
    </style>



    <div class="w-full h-full flex justify-center align-center mt-12">
        <div class="flex-column">
            <!-- Category Section with 2 Cards -->
            <section id="category" class="main-bg py-20">
                <div class="card-container flex justify-center items-center gap-12 ">
                    <div class="card w-96 h-96 bg-white rounded-lg shadow-lg flex flex-col mt-32">
                        <!-- Image Inside the Card -->
                        <img src="https://myxperiencefitness.com/wp-content/uploads/2021/05/shutterstock_1060688873-scaled.jpg"
                            alt="Calorie Calculator" class="w-full h-48 rounded-t-lg object-cover">

                        <h3 class="text-2xl font-semibold text-slate-800 mt-6">Calorie Calculator</h3>
                        <p class="text-slate-600 text-lg">Calculate your daily calorie needs.</p>
                        <button class="w-full bg-red-600 text-white py-3 rounded hover:bg-red-700 mt-4"
                            onclick="toggleCalorieCalculator()">Start</button>
                    </div>

                    <div class="card w-96 h-96 bg-white rounded-lg shadow-lg flex flex-col mt-32">
                        <!-- Image Inside the Card -->
                        <img src="https://www.diabetes.co.uk/wp-content/uploads/2022/09/bmi-calculation.jpg"
                            alt="BMI Calculator" class="w-full h-48 rounded-t-lg object-cover">

                        <h3 class="text-2xl font-semibold text-slate-800 mt-6">BMI Calculator</h3>
                        <p class="text-slate-600 text-lg">Calculate your Body Mass Index.</p>
                        <button class="w-full bg-red-600 text-white py-3 rounded hover:bg-red-700 mt-4"
                            onclick="toggleBMIForm()">Start</button>
                    </div>

                </div>
            </section>


            <section id="calorie-calculator" class="main-bg flex flex-col items-center justify-start py-10 hidden">
                <h2 class="text-2xl font-semibold mb-4 text-black mt-24">Calorie Calculator</h2>

                <form id="calorieForm" class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                    <div class="mb-4">
                        <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                        <input type="number" id="weight"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="height" class="block text-sm font-medium text-gray-700">Height (cm)</label>
                        <input type="number" id="height"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" id="age"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="bodyFat" class="block text-sm font-medium text-gray-700">Body Fat (%) <span
                                class="text-xs">(Optional for Katch-McArdle)</span></label>
                        <input type="number" id="bodyFat"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="gender"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <button type="button" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700"
                        onclick="calculateCalories()">Calculate</button>
                </form>
                <div id="calorieResults"
                    class="mt-6 p-4 bg-gray-100 rounded shadow-lg w-full max-w-md text-slate-800 hidden">
                    <h3 class="text-lg font-semibold mb-2">Results:</h3>
                    <div class="result-item mb-2">
                        <strong>Maintain weight:</strong>
                        <p id="maintainCalories" class="text-lg font-medium"></p>
                    </div>
                    <div class="result-item mb-2">
                        <strong>Mild weight loss (0.5 lb/week):</strong>
                        <p id="mildLossCalories" class="text-lg font-medium"></p>
                    </div>
                    <div class="result-item mb-2">
                        <strong>Weight loss (1 lb/week):</strong>
                        <p id="lossCalories" class="text-lg font-medium"></p>
                    </div>
                    <div class="result-item mb-2">
                        <strong>Extreme weight loss (2 lb/week):</strong>
                        <p id="extremeLossCalories" class="text-lg font-medium"></p>
                    </div>
                    <button type="button" class="mt-4 w-full bg-gray-600 text-white py-2 rounded hover:bg-gray-700"
                        onclick="clearResults()">Clear Result</button>
                </div>
            </section>
            <section id="bmi-calculator" class="main-bg flex flex-col items-center justify-start py-10 hidden">
                <h2 class="text-2xl font-semibold mb-4 text-black mt-24">BMI Calculator</h2>
                <form id="bmiForm" class="bg-white p-6 rounded shadow-lg w-full max-w-md">
                    <div class="mb-4">
                        <label for="weightBMI" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
                        <input type="number" id="weightBMI"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="heightBMI" class="block text-sm font-medium text-gray-700">Height (cm)</label>
                        <input type="number" id="heightBMI"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="genderBMI" class="block text-sm font-medium text-gray-700">Gender</label>
                        <select id="genderBMI"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500">
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="ageBMI" class="block text-sm font-medium text-gray-700">Age</label>
                        <input type="number" id="ageBMI"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500"
                            required>
                    </div>
                    <button type="button" class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700"
                        onclick="calculateBMI()">Calculate</button>
                </form>
                <div id="bmiResults"
                    class="mt-6 p-4 bg-gray-100 rounded shadow-lg w-full max-w-md text-slate-800 hidden">
                    <h3 class="text-lg font-semibold mb-2">Results:</h3>
                    <p><strong>Your BMI:</strong> <span id="bmiResult"></span></p>
                    <p><strong>Status:</strong> <span id="bmiStatus"></span></p>
                    <button type="button" class="mt-4 w-full bg-gray-600 text-white py-2 rounded hover:bg-gray-700"
                        onclick="clearBMIForm()">Clear Result</button>
                </div>
            </section>
        </div>

    </div>


    <div class="w-full">
        <section id="Footlong" class="bg-black text-white py-6">
            <footer class="max-w-7xl mx-auto text-center">
                <p class="text-sm">© 2024 Fitness Hub. All rights reserved.</p>
                <div class="flex justify-center space-x-4 mt-2">
                    <a href="#" class="text-white hover:text-red-600">Privacy Policy</a>
                    <a href="#" class="text-white hover:text-red-600">Terms of Service</a>
                    <a href="#" class="text-white hover:text-red-600">Contact Us</a>
                </div>
            </footer>
        </section>
    </div>



    <script>
        function calculateCalories() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value);
            const age = parseFloat(document.getElementById('age').value);
            const bodyFat = parseFloat(document.getElementById('bodyFat').value) || 0;
            const gender = document.getElementById('gender').value;

            if (isNaN(weight) || isNaN(height) || isNaN(age)) {
                alert("Please enter valid weight, height, and age.");
                return;
            }

            // Mifflin-St Jeor Equation
            let bmrMifflin = (gender === 'male')
                ? 10 * weight + 6.25 * height - 5 * age + 5
                : 10 * weight + 6.25 * height - 5 * age - 161;

            // Calorie estimates
            const maintainCalories = bmrMifflin;
            const mildLossCalories = maintainCalories * 0.89;
            const lossCalories = maintainCalories * 0.78;
            const extremeLossCalories = maintainCalories * 0.56;

            // Display results
            document.getElementById('maintainCalories').textContent = `${maintainCalories.toFixed(0)} calories/day (100%)`;
            document.getElementById('mildLossCalories').textContent = `${mildLossCalories.toFixed(0)} calories/day (89%)`;
            document.getElementById('lossCalories').textContent = `${lossCalories.toFixed(0)} calories/day (78%)`;
            document.getElementById('extremeLossCalories').textContent = `${extremeLossCalories.toFixed(0)} calories/day (56%)`;

            document.getElementById('calorieResults').classList.remove('hidden');
        }

        function clearResults() {
            document.getElementById('calorieForm').reset();
            document.getElementById('calorieResults').classList.add('hidden');
        }
    </script>




    <!-- BMI Calculator Content (Hidden Initially) -->


    <script>
        // Toggle visibility of the BMI Calculator form
        function toggleBMIForm() {
            // Hide the category section
            document.getElementById('category').classList.add('hidden');
            // Show the BMI calculator section
            document.getElementById('bmi-calculator').classList.remove('hidden');
        }

        // Function to calculate BMI
        function calculateBMI() {
            const weight = parseFloat(document.getElementById('weightBMI').value);
            const height = parseFloat(document.getElementById('heightBMI').value);

            if (isNaN(weight) || isNaN(height)) {
                alert("Please enter valid weight and height.");
                return;
            }

            // Convert height to meters
            const heightInMeters = height / 100;

            // Calculate BMI
            const bmi = weight / (heightInMeters * heightInMeters);

            // Display the result
            document.getElementById('bmiResult').textContent = bmi.toFixed(2);

            // Determine BMI status
            let status = '';
            let foodSuggestion = '';

            if (bmi < 18.5) {
                status = 'Underweight';
                foodSuggestion = "Consider high-calorie, nutrient-dense foods such as nuts, avocados, whole grains, lean proteins, and healthy fats.";
            } else if (bmi >= 18.5 && bmi < 24.9) {
                status = 'Normal weight';
                foodSuggestion = "Maintain your healthy weight with a balanced diet that includes lean proteins, vegetables, fruits, whole grains, and plenty of water.";
            } else if (bmi >= 25 && bmi < 29.9) {
                status = 'Overweight';
                foodSuggestion = "Focus on foods like leafy greens, lean proteins, fruits, and avoid sugary and processed foods to manage your weight.";
            } else {
                status = 'Obesity';
                foodSuggestion = "Opt for a diet rich in vegetables, whole grains, lean proteins, and minimize processed foods and sugars. Consider consulting a nutritionist for personalized guidance.";
            }

            // Display the status
            document.getElementById('bmiStatus').textContent = status;

            // Display the food suggestion
            const foodSuggestionDiv = document.createElement('div');
            foodSuggestionDiv.classList.add('mt-4', 'text-slate-800', 'p-4', 'bg-yellow-100', 'rounded', 'shadow');
            foodSuggestionDiv.innerHTML = `<strong>Food Suggestion:</strong> <p>${foodSuggestion}</p>`;

            // Append the food suggestion to the results section
            document.getElementById('bmiResults').appendChild(foodSuggestionDiv);

            // Show results
            document.getElementById('bmiResults').classList.remove('hidden');
        }


        function clearBMIForm() {
            document.getElementById('bmiForm').reset();
            document.getElementById('bmiResults').classList.add('hidden');
        }

        // Toggle visibility of the Calorie Calculator form
        function toggleCalorieCalculator() {
            // Hide the category section
            document.getElementById('category').classList.add('hidden');
            // Show the calorie calculator section
            document.getElementById('calorie-calculator').classList.remove('hidden');
        }

        // Calorie calculation logic (Mifflin, Harris, Katch)...
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const elements = document.querySelectorAll('.fade-in');
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>


</x-layout>