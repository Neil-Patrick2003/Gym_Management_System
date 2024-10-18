<x-app-layout>
    <h1 class="mb-6">
        New Programs
    </h1>

    <form action="/admini/programs/create" method="POST">
        @csrf
        <div>
            <label for="username" class="relative block w-2/5">
                <input type="text" id="username"
                    class="w-full h-12 px-4 text-lg outline-none border-2 border-gray-400 rounded-lg hover:border-gray-600 duration-200 peer focus:border-indigo-600 bg-inherit">
                <span
                    class="absolute left-3 top-2 px-1 text-lg uppercase tracking-wide text-gray-400 duration-200 peer-focus:text-indigo-600 peer-focus:text-sm peer-focus:-translate-y-5 bg-white">Username</span>
            </label>

        </div>
    </form>

</x-app-layout>
