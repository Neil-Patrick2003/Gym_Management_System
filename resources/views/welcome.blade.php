<x-layout>

    <div class="flex items-center justify-center h-screen w-full"
        style="
        background-image: url('{{ asset('images/bg.png') }}');
        background-size: cover;
        background-position: center;
        ">
        <div class="mt-4 text-center">
            <h1 class="text-6xl font-black	 text-white font-bold">Welcome to FitnessHub</h1>
            <p class="text-3xl mt-4 text-white">Your journey to a healthier life starts here.</p>
            <center>
                <a href="/register"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold px-6 py-4 rounded-full mt-12 inline-block w-40">
                    Get Started
                </a>
            </center>

        </div>
    </div>
</x-layout>
