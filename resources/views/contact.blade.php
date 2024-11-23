<x-layout>
    <div class="contact w-full">
        <div class="main-bg flex flex-col items-center justify-center w-full p-8 mt-12">
            <section id="Con" class="flex flex-wrap justify-between space-x-4">
                <div class="text-center text-white mb-12 w-full lg:w-1/2">
                <h1 class="text-4xl font-bold text-black">Contact Us</h1>
                <p class="mt-4 text-black">We'd love to hear from you! Reach out to us via our social media platforms:</p>


                    <div class="mt-6 space-y-4">
                        <!-- Social Media Links with White Background -->
                        <div class="social-card bg-white p-4 rounded-lg shadow-lg">
                            <p>
                                <a href="https://www.facebook.com/profile.php?id=100077322593230" target="_blank"
                                    class="text-black hover:text-blue-500 text-shadow">
                                    <i class="fab fa-facebook-square"></i> Facebook
                                </a>
                            </p>
                        </div>
                        <div class="social-card bg-white p-4 rounded-lg shadow-lg">
                            <p>
                                <a href="https://www.instagram.com/goldsgym/" target="_blank"
                                    class="text-black hover:text-pink-500 text-shadow">
                                    <i class="fab fa-instagram"></i> Instagram
                                </a>
                            </p>
                        </div>
                        <div class="social-card bg-white p-4 rounded-lg shadow-lg">
                            <p>
                                <a href="mailto:goldsgym@gmail.com" class="text-black hover:text-red-500 text-shadow">
                                    <i class="fas fa-envelope"></i> Gmail
                                </a>
                            </p>
                        </div>
                        <div class="social-card bg-white p-4 rounded-lg shadow-lg">
                            <p>
                                <a href="https://x.com/GoldsGym" target="_blank"
                                    class="text-black hover:text-blue-400 text-shadow">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="conform" class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full lg:w-1/2">
                    <h2 class="text-2xl font-semibold text-black mb-4 text-center">You Can Directly Send a Message via Mobile Number</h2>
                    <form action="#" method="POST" class="space-y-4">
                        <div>
                            <label for="name" class="text-black">Name</label>
                            <input type="text" id="name" name="name" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded">
                        </div>
                        <div>
                            <label for="email" class="text-black">Mobile Number</label>
                            <input type="email" id="email" name="email" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded">
                        </div>
                        <div>
                            <label for="message" class="text-black">Message</label>
                            <textarea id="message" name="message" rows="4" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded"></textarea>
                        </div>
                        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 w-full">Send Message</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <div id="conform" class="bg-white p-6 rounded-lg shadow-lg max-w-lg w-full lg:w-1/2">
    <h2 class="text-2xl font-semibold text-black mb-4 text-center">You Can Directly Send a Message via Mobile Number</h2>
    <form action="#" method="POST" class="space-y-4">
        <div>
            <label for="name" class="text-black">Name</label>
            <input type="text" id="name" name="name" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded">
        </div>
        <div>
            <label for="email" class="text-black">Mobile Number</label>
            <input type="email" id="email" name="email" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded">
        </div>
        <div>
            <label for="message" class="text-black">Message</label>
            <textarea id="message" name="message" rows="4" required class="w-full p-2 mt-1 bg-gray-700 text-black rounded"></textarea>
        </div>
        <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded hover:bg-red-700 w-full">Send Message</button>
    </form>
</div>
</section>
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
