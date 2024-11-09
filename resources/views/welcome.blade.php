<x-layout>




    <div class="flex items-center justify-center h-screen w-full"
        style="
        background-image: url('{{ asset('images/bg.png') }}');
        background-size: cover;
        background-position: center;
        ">
        <div class="text-center">
            <h1 class="text-4xl text-white font-bold">Welcome to FitnessHub</h1>
            <p class="mt-4 text-white">Your journey to a healthier life starts here.</p>

            <a href="/register"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mt-12 inline-block w-32">
                Get Started
            </a>
        </div>
    </div>




</x-layout>



{{-- @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif --}}

{{-- </body> --}}
