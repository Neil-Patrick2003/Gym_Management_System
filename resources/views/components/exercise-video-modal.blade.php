<div x-show="{{ $show }}"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 text-slate-800" x-cloak>
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm mx-auto">
        testing

        <video width="640" height="360" controls>
            <source src="{{ asset('videos/example.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>




        <div class="flex justify-end">
            <button type="button" class="bg-gray-300 px-4 py-2 rounded mr-2" @click="{{ $onClose }}">
                Cancel
            </button>
        </div>
    </div>
</div>
