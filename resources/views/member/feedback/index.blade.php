<x-member-layout>
    <form action="/member/feedback" method="POST">
        @csrf
        <div class="h-screen px-3 py-16 mx-auto flex justify-center items-center"
            style="background-image: url('https://static.vecteezy.com/system/resources/previews/022/653/712/non_2x/treadmill-in-modern-gym-toned-image-3d-rendering-generative-ai-free-photo.jpg'); background-size: cover; background-position: center;">

            <!-- Outer White Card -->
            <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-lg">

                <!-- Inner Gradient Card (Red and Orange) -->
                <div class="bg-gradient-to-r from-red-500 to-orange-500 p-6 rounded-lg mb-6">
                    <!-- Stars Display -->
                    <div class="text-center mb-4">
                        <span class="text-yellow-400 text-2xl">★★★★★</span>
                    </div>

                    <h1 class="text-2xl font-bold text-white text-center">We Value Your Feedback!</h1>
                    <p class="text-white text-center mt-2">Your insights help us improve and provide you with the best
                        experience possible.</p>
                </div>

                <!-- Feedback Form -->
                <div class="mb-4">
                    <label for="message" class="text-sm leading-7 text-gray-600">Message</label>
                    <textarea id="message" name="message"
                        class="h-32 w-full resize-none rounded border border-gray-300 bg-white py-2 px-3 text-base leading-6 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200"></textarea>
                </div>
                <button type="submit"
                    class="rounded border-0 bg-gradient-to-r from-red-500 to-orange-500 py-2 px-6 text-lg text-white hover:from-red-400 hover:to-orange-400 focus:outline-none mb-4">
                    Send Feedback
                </button>


                <!-- Social Media Section -->
                <p class="mt-4 text-sm text-gray-500 text-center">Thank you for your response.</p>
            </div>
        </div>
    </form>

    <!-- Success Modal -->
    <div id="feedbackModal"
        style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center;">
        <div style="background: white; padding: 20px; border-radius: 5px; width: 300px; text-align: center;">
            <p>{{ session('success') }}</p>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show the modal if there's a success message
            @if (session('success'))
                document.getElementById('feedbackModal').style.display = 'flex';
            @endif
        });

        // Function to close the modal
        function closeModal() {
            document.getElementById('feedbackModal').style.display = 'none';
        }
    </script>
</x-member-layout>
