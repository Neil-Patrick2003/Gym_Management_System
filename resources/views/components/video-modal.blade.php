<div x-data="{ modalOpen: false, iframeSrc: '' }">
    <!-- Trigger button for the video modal -->
    <button @click="modalOpen = true; iframeSrc = '{{ $videoUrl }}?autoplay=1'" 
            class="bg-blue-500 text-white px-4 py-2 rounded">
        Play Video
    </button>

    <!-- Modal Backdrop -->
    <div x-show="modalOpen" 
         @click="modalOpen = false; iframeSrc = ''" 
         class="fixed inset-0 z-50 bg-black bg-opacity-50 transition-opacity"></div>

    <!-- Modal Dialog -->
    <div x-show="modalOpen" 
         x-transition:enter="transition ease-out duration-300" 
         x-transition:enter-start="opacity-0 scale-75" 
         x-transition:enter-end="opacity-100 scale-100" 
         x-transition:leave="transition ease-out duration-200" 
         x-transition:leave-start="opacity-100 scale-100" 
         x-transition:leave-end="opacity-0 scale-75"
         class="fixed inset-0 z-50 flex justify-center items-center p-6">

        <div class="max-w-5xl mx-auto h-full flex items-center">
            <div class="w-full max-h-full rounded-3xl shadow-2xl bg-black overflow-hidden">
                
                <!-- Close Button -->
                <button @click="modalOpen = false; iframeSrc = ''" 
                        class="absolute top-0 right-0 p-4 text-white bg-black bg-opacity-50 rounded-full hover:bg-opacity-75">
                    X
                </button>

                <!-- YouTube Embed (iframe) -->
                <iframe x-show="modalOpen" 
                        :src="iframeSrc ? iframeSrc.replace('watch?v=', 'embed/') : ''" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                        allowfullscreen width="100%" height="100%"></iframe>
            </div>
        </div>
    </div>
</div>
