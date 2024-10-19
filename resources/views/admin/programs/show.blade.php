<x-app-layout>
    <div class="relative border border-gray-300 rounded-lg mb-4 overflow-hidden"
        style="background-image: url('{{ asset('storage/' . $program->photo_link) }}');
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
                height: 300px;
                border-radius: 15px;
                opacity: 98%;">

        <!-- Optional Overlay and Content -->
        <div class="absolute px-4 py-4 inset-0 bg-black/50 flex items-end justify-between">
            <div>
                <h2 class="text-white text-xl font-bold">{{ $program->name }}</h2>
                <p class="text-white">Created by: {{ $program->created_by }}</p>
            </div>
            <div>
                <a href="/admin" class="inline-block">
                    <button type="button" class="rounded-full bg-indigo-600 p-2 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                          <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                        </svg>
                      </button>
                </a>

            </div>
        </div>

    </div>
</x-app-layout>
