<x-layout>

    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold">Welcome to FitnessHub</h1>
        <p class="mt-4">Your journey to a healthier life starts here.</p>
        {{-- <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mt-8">Get
            started</button> --}}
        <center>
            <a href="/register"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full mt-12 block w-32">
                Get Started
            </a>
        </center>

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
