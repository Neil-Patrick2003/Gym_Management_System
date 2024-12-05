<div x-data="{ modalOpen: false, iframeSrc: '' }">
    <!-- Trigger button for the video modal -->
    <div class="group overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
        <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
            alt="" class="pointer-events-none aspect-[10/7] object-cover group-hover:opacity-75">
        <button type="button" class="absolute inset-0 focus:outline-none" @click="modalOpen = true; iframeSrc = '{{ $videoUrl }}?autoplay=1'">
            <span class="sr-only">View details for IMG_4985.HEIC</span>
        </button>
    </div>

    <!-- Modal Backdrop -->
    <div x-show="modalOpen" @click="modalOpen = false; iframeSrc = ''"
        class="fixed inset-0 z-50 bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Modal Dialog -->
    <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-75" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-75" class="fixed inset-0 z-50 flex justify-center items-center p-6">

        <div class="max-w-5xl mx-auto h-full flex items-center">
            <div class="w-full max-h-full rounded-3xl shadow-2xl bg-black overflow-hidden">

                <!-- Close Button -->
                <button @click="modalOpen = false; iframeSrc = ''"
                    class="absolute top-0 right-0 p-4 text-white bg-black bg-opacity-50 rounded-full hover:bg-opacity-75">
                    X
                </button>

                <!-- YouTube Embed (iframe) -->
                <iframe x-show="modalOpen" :src="iframeSrc ? iframeSrc.replace('watch?v=', 'embed/') : ''"
                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</div>
