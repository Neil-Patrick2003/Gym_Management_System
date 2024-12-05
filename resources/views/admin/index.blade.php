<x-app-layout>
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($stats as $stat)
                <div class="bg-white p-5 shadow-sm space-y-2">
                    <p class="text-lg font-semibold tracking-wide">{{$stat['title']}}</p>
                    <p class="text-3xl text-slate-800 font-thin">{{$stat['value']}}</p>
                </div>
            @endforeach
        </div>
    </div>



</x-app-layout>
