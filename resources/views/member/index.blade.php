<x-member-layout>

    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="col-span-3 gap-y-4">
            <div class="overflow-hidden">
                <div class="h-36 bg-none border bg-center rounded-lg w-full p-4 mb-4"
                    style="background-image: url('{{ asset('images/final.1.png') }}');">
                    <div class="flex flex-row space-between text-neutral-100 h-full">
                        <div class="flex-col">
                            <h1 class="text-xl text-neutral-50 font-bold">Keep on Track on your journey</h1>
                            <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                                velit..."</p>
                        </div>
                        <div>
                            <img src="{{ asset('images/header-bg.png') }}" alt="" class="h-32 w-56 object-cover">
                        </div>

                    </div>
                </div>


            </div>
            <div class="flex flex-row space-between w-full gap-x-4 mb-4">
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6">
                        hi
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6">
                        hi
                    </div>
                </div>
                <div class="overflow-hidden rounded-lg bg-white w-1/3 shadow">
                    <div class="px-4 py-5 sm:p-6">
                        hi
                    </div>
                </div>
            </div>
            <div>
                <div class="overflow-hidden rounded-lg bg-white shadow">
                    <div class="px-4 py-5 sm:p-6">
                        <!-- Content goes here -->
                    </div>
                </div>
            </div>

        </div>
        <div class="overflow-hidden rounded-lg bg-white w-full shadow">
            <div class="px-4 py-5 sm:p-6">
                hi
            </div>
        </div>

    </div>





    {{-- Programs sample list --}}
    {{-- <div class="flex flex-col bg-zinc-800 m-auto p-auto">
        <h1 class="flex py-5 lg:px-20 md:px-10 px-5 lg:mx-40 md:mx-20 mx-5 font-bold text-4xl text-white">
            Programs
        </h1>
        <div class="flex overflow-x-scroll pb-10 hide-scroll-bar">
            <div class="flex flex-nowrap lg:ml-40 md:ml-20 ml-10">
                @foreach ($programs as $program)
                    <div class="inline-block px-3 ">
                        <div class="w-96 h-64 bg-cover bg-center border border-solid max-w-96 overflow-hidden rounded-lg bg-white hover:shadow-xl transition-shadow duration-300 ease-in-out"
                            style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');">>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}

    <!-- Fixed Check-in Button -->
    <div class="fixed bottom-4 right-4 z-50">
        <button id="openModal"
            class="inline-flex items-center justify-center bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-indigo-500 transition-all">
            Check in
        </button>
    </div>


    {{-- Modal Select trainers --}}
    <div id="myModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 w-2/3 max-w-lg">
            <!-- Modal Header -->
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold">Choose Trainer</h2>
                <button id="closeModal" class="text-gray-600 text-2xl">&times;</button>
            </div>

            <!-- Horizontal Scrollable Content Area without Scrollbar -->
            <div class="modal-body max-h-96 overflow-y-auto mt-4">
                <div class="flex space-x-4 overflow-x-auto p-4  hide-scroll-bar">
                    @foreach ($trainers as $trainer)
                        <form action="/home" method="POST">
                            @csrf
                            <input type="hidden" name="trainer_id" value="{{ $trainer->id }}">
                            @csrf
                            <button type="submit"
                                class=" h-40 flex-shrink-0 bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-4 w-40 text-center font-semibold focus:outline-none">
                                {{ $trainer->name }}
                            </button>
                        </form>
                    @endforeach
                </div>
            </div>

            <!-- Additional Button or Actions -->
        </div>
    </div>

    ksaljdddalkadsadlkadadlksajdsaddklj

    <style>
        .hide-scroll-bar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scroll-bar::-webkit-scrollbar {
            display: none;
        }
    </style>

    <script>
        // Get modal and button elements
        const modal = document.getElementById("myModal");
        const openModalBtn = document.getElementById("openModal");
        const closeModalBtn = document.getElementById("closeModal");

        // Open modal when the button is clicked
        openModalBtn.onclick = () => {
            modal.classList.remove("hidden");
        };

        // Close modal when the close button (×) is clicked
        closeModalBtn.onclick = () => {
            modal.classList.add("hidden");
        };

        // Close modal when clicking outside of it
        window.onclick = (event) => {
            if (event.target === modal) {
                modal.classList.add("hidden");
            }
        };
    </script>
</x-member-layout>
