<x-layout>
    <div class="main-bg w-full gallery">
        <!-- Trainer Section -->
        <section id="trainor" class="mt-8 bg-cover bg-center h-screen relative" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/b/b6/Gym_wiki.jpg');">
            <!-- Overlay with dark and blur effect -->
            <div class="absolute inset-0 bg-black opacity-50 blur-sm"></div>

            <div class="flex flex-col items-center justify-start h-full relative z-10">
                <div class="text-center text-white p-8">
                    <h1 class="text-4xl font-bold mb-8 mt-8 text-white">Train With Us</h1>
                </div>

                <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 max-w-7xl mx-auto px-4">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                        <img src="https://as1.ftcdn.net/v2/jpg/02/64/23/78/1000_F_264237813_6Yn9JJkBZkuGP9gEgebCA5xVqhqz76v3.jpg" alt="Training Image 1" class="w-full h-96 object-cover">
                        <div class="p-6">
                            <h2 class="font-semibold text-xl">Trainer 1</h2>
                            <p class="text-gray-600">Description of the trainer.</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                        <img src="https://as1.ftcdn.net/v2/jpg/02/64/23/78/1000_F_264237813_6Yn9JJkBZkuGP9gEgebCA5xVqhqz76v3.jpg" alt="Training Image 2" class="w-full h-96 object-cover">
                        <div class="p-6">
                            <h2 class="font-semibold text-xl">Trainer 2</h2>
                            <p class="text-gray-600">Description of the trainer.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Workout Videos Section -->
        <section id="vids" class="py-10 bg-gray-100">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold">Workout Videos</h2>
            </div>
            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-3 max-w-7xl mx-auto px-4">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <div class="relative pb-[56.25%]">
                        <iframe src="https://drive.google.com/file/d/1ic2tSW-uqWoZrz8njeQS8F1283eq1KbU/preview" class="absolute inset-0 w-full h-full rounded-lg" allow="autoplay"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Chest Workout</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <div class="relative pb-[56.25%]">
                        <iframe src="https://drive.google.com/file/d/1eQX_I671q0L2Nsb0ypar8DY-OhSt4mzz/preview" class="absolute inset-0 w-full h-full rounded-lg" allow="autoplay"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Back Workout</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <div class="relative pb-[56.25%]">
                        <iframe src="https://drive.google.com/file/d/1n0YllT_5aV8scgg4xRA5uhG1xrmNY-e5/preview" class="absolute inset-0 w-full h-full rounded-lg" allow="autoplay"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Arms Workout</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <iframe src="https://drive.google.com/file/d/1NUEzpb--ivQViPEI5q6hZWuNNKPK1sXL/preview" width="100%" height="200" allow="autoplay" class="rounded-lg"></iframe>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Abdominal Workout</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <div class="relative pb-[56.25%]">
                        <iframe src="https://drive.google.com/file/d/1pMsV5BLXyyX2ZVB2kveJyO_74V_vposI/preview" class="absolute inset-0 w-full h-full rounded-lg" allow="autoplay"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Legs Workout</h3>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg overflow-hidden card fade-in">
                    <div class="relative pb-[56.25%]">
                        <iframe src="https://drive.google.com/file/d/1bn7seu1Ygilty0hdYdvcVucl1gjZma0n/preview" class="absolute inset-0 w-full h-full rounded-lg" allow="autoplay"></iframe>
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-lg">Shoulders Workout</h3>
                    </div>
                </div>
            </div>
        </section>

        <!-- Divider Section -->
        <section id="divider" class="py-10" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(255, 0, 0, 0.8));">
            <div class="container mx-auto text-center backdrop-blur-lg rounded-lg p-6">
                <p class="text-white">Stay tuned for more updates!</p>
            </div>
        </section>

        <!-- Why Fitness Section -->
        <section id="whyFitness" class="py-10 bg-white">
            <div class="max-w-7xl mx-auto px-4 flex flex-col lg:flex-row items-start gap-10">
                <div class="w-full lg:w-1/2 fade-in">
                    <h2 class="text-3xl font-bold mb-4">Why You Should Go to the Gym</h2>
                    <ul class="list-disc list-inside text-gray-700 space-y-2">
                        <li>Improves overall physical health and fitness.</li>
                        <li>Enhances mental well-being and reduces stress.</li>
                        <li>Increases energy levels for daily activities.</li>
                        <li>Promotes better quality of sleep.</li>
                        <li>Boosts self-confidence and body image.</li>
                        <li>Provides a structured routine for fitness goals.</li>
                        <li>Encourages social interaction and community support.</li>
                        <li>Offers access to professional guidance and equipment.</li>
                        <li>Helps in weight management and fat loss.</li>
                        <li>Increases longevity and improves quality of life.</li>
                    </ul>
                    <p class="mt-4 text-gray-700">
                        <strong>Our Story</strong><br>
                        Gleah's Fitness, established in 2020, has inspired countless individuals to transform their
                        lives through weightlifting, creating a community filled with life-changing stories. Our gym is
                        a sanctuary where members push their limits, build strength, and gain confidence.
                    </p>
                </div>

                <div class="w-full lg:w-1/2">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden fade-in">
                        <img src="https://www.fitnessfirst.com/ph/en/-/media/project/evolution-wellness/fitness-first/philippines/why-fitness-first-brand-image-1.jpg?extension=webp"
                             alt="Why Fitness First" class="w-full h-[600px] object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Story Section -->
        <section id="Our Story" class="py-0 bg-white mb-0">
            <div class="w-full relative">
                <div class="relative bg-cover bg-center" style="background-image: url('https://d296qbqev3kq48.cloudfront.net/wp-content/uploads/2018/02/14202150/shutterstock_559177615.jpg'); min-height: 80vh; height: 100%;">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="absolute left-0 top-0 p-4 text-white z-10 pl-10">
                        <h2 class="text-3xl font-bold mb-2 fade-in">Our Story</h2>
                        <p class="text-xl mb-2 fade-in">2020</p>
                        <p class="text-lg fade-in">Fitness Begins</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer Section -->
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
</x-layout>
