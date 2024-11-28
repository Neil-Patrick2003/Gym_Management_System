<div x-data="{ modalOpen: false, iframeSrc: '' }">
    <!-- Trigger button for the video modal -->
    <button @click="modalOpen = true; iframeSrc = 'https://www.youtube.com/embed/{{ $videoUrl }}?autoplay=1'" class="relative flex justify-center items-center focus:outline-none focus-visible:ring focus-visible:ring-indigo-300 rounded-3xl group">
        <img class="rounded-xl shadow-2xl transition-shadow duration-300 ease-in-out" 
            src="https://via.placeholder.com/768x432.png?text=Video+Thumbnail" 
            width="768" height="432" 
            alt="Video Thumbnail" />
        
        <!-- Play Icon Overlay -->
        <svg class="absolute pointer-events-none group-hover:scale-110 transition-transform duration-300 ease-in-out" xmlns="http://www.w3.org/2000/svg" width="72" height="72">
            <circle class="fill-white" cx="36" cy="36" r="36" fill-opacity=".8" />
            <path class="fill-indigo-500 drop-shadow-2xl" d="M44 36a.999.999 0 0 0-.427-.82l-10-7A1 1 0 0 0 32 29V43a.999.999 0 0 0 1.573.82l10-7A.995.995 0 0 0 44 36V36c0 .001 0 .001 0 0Z" />
        </svg>
    </button>

    <!-- Modal Backdrop -->
    <div x-show="modalOpen" 
        @click="modalOpen = false; iframeSrc = ''" 
        class="fixed inset-0 z-[99999] bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Modal Dialog -->
    <div x-show="modalOpen" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 scale-75" 
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-out duration-200" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-75"
        class="fixed inset-0 z-[99999] flex justify-center items-center p-6">

        <div class="max-w-5xl mx-auto h-full flex items-center">
            <div class="w-full max-h-full rounded-3xl shadow-2xl bg-black overflow-hidden">
                
                <!-- Close Button -->
                <button @click="modalOpen = false; iframeSrc = ''" 
                    class="absolute top-0 right-0 p-4 text-white bg-black bg-opacity-50 rounded-full hover:bg-opacity-75">
                    X
                </button>

                <!-- YouTube Embed (iframe) -->
                <iframe x-show="modalOpen" 
                    :src="iframeSrc" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</div>
