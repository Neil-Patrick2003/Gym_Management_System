<x-layout>
    <div class="contact">
        <div class="main-bg flex flex-col items-center justify-center p-8 mt-12 ">
            <div class="text-center text-white mb-12">
                <h1 class="text-4xl font-bold text-shadow">Contact Us</h1>
                <p class="mt-4 text-shadow">We'd love to hear from you! Reach out to us via our social media platforms:</p>

                <div class="mt-6 space-y-4">
                    <!-- Social Media Links with Icons -->
                    <div class="social-card">
                        <p><a href="https://www.facebook.com/profile.php?id=100077322593230" target="_blank"
                                class="text-white hover:text-blue-500 text-shadow">
                                <i class="fab fa-facebook-square"></i> Facebook
                            </a></p>
                    </div>
                    <div class="social-card">
                        <p><a href="https://www.instagram.com/goldsgym/" target="_blank"
                                class="text-white hover:text-pink-500 text-shadow">
                                <i class="fab fa-instagram"></i> Instagram
                            </a></p>
                    </div>
                    <div class="social-card">
                        <p><a href="mailto:goldsgym@gmail.com" class="text-white hover:text-red-500 text-shadow">
                                <i class="fas fa-envelope"></i> Gmail
                            </a></p>
                    </div>
                    <div class="social-card">
                        <p><a href="https://x.com/GoldsGym" target="_blank"
                                class="text-white hover:text-blue-400 text-shadow">
                                <i class="fab fa-twitter"></i> Twitter
                            </a></p>
                    </div>
                </div>
            </div>

            <!-- Send a Message Form Centered -->
            <div class="bg-gray-800 p-6 rounded-lg shadow-lg max-w-lg w-full">
                <h2 class="text-2xl font-semibold text-white mb-4 text-center"> You Can Directly Send a Message via Mobile
                    Number</h2>
                <form action="#" method="POST" class="space-y-4">
                    <div>
                        <label for="name" class="text-white">Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full p-2 mt-1 bg-gray-700 text-white rounded">
                    </div>
                    <div>
                        <label for="email" class="text-white">Mobile Number</label>
                        <input type="email" id="email" name="email" required
                            class="w-full p-2 mt-1 bg-gray-700 text-white rounded">
                    </div>
                    <div>
                        <label for="message" class="text-white">Message</label>
                        <textarea id="message" name="message" rows="4" required class="w-full p-2 mt-1 bg-gray-700 text-white rounded"></textarea>
                    </div>
                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 w-full">Send
                        Message</button>
                </form>
            </div>
        </div>

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
