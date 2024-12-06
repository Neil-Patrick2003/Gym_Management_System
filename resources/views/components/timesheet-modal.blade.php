<div
    x-show="{{ $show }}"
    class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50 text-slate-800"
    x-cloak
>
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm mx-auto">
        <h2 class="text-xl font-bold mb-4">{{$currentTimesheet ? 'Ongoing Timesheet' : 'New Timesheet'}}</h2>

        @if($currentTimesheet)
            <div class="space-y-2">
                <p>Start: {{$currentTimesheet->start_time}}</p>

                @if($currentTimesheet->trainer)
                    <p>Trainer: {{$currentTimesheet->trainer->name}}</p>

                    <form action="/timesheet/{{$currentTimesheet->id}}/remove-trainer" method="POST">
                        @csrf

                        <button type="submit" class="bg-slate-800 text-white w-full px-2 py-2.5">
                            Remove Trainer
                        </button>
                    </form>

                @else
                    <form class="space-y-2" action="/timesheet/{{$currentTimesheet->id}}/add-trainer" method="POST">
                        @csrf

                        <select required name="trainer_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm/6">
                            <option value="">No Trainer</option>
                            @foreach($trainers as $trainer)
                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="bg-slate-800 text-white w-full px-2 py-2.5">
                            Add Trainer
                        </button>
                    </form>
                @endif


                <form action="/timesheet/{{$currentTimesheet->id}}/checkout" method="POST">
                    @csrf

                    <button type="submit" class="bg-slate-800 text-white w-full px-2 py-2.5">Check Out</button>
                </form>
            </div>

        @else
            <div class="space-y-2">
                <form action="/timesheet/checkin" method="POST">
                    @csrf

                    <div class="space-y-2">
                        <select name="trainer_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm/6">
                            <option value="">I dont need a trainer today</option>
                            @foreach($trainers as $trainer)
                                <option value="{{$trainer->id}}">{{$trainer->name}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="bg-slate-800 text-white w-full px-2 py-2.5">Check In</button>
                    </div>
                </form>
            </div>
        @endif




{{--        <form--}}
{{--            :action="mode === 'add' ? '/skills' : `/skills/${formData.id}`"--}}
{{--            method="POST"--}}
{{--        >--}}
{{--            @csrf--}}
{{--            <template x-if="mode === 'edit'">--}}
{{--                <input type="hidden" name="_method" value="PUT">--}}
{{--            </template>--}}

{{--            <!-- Form Fields -->--}}
{{--            <div class="mb-4">--}}
{{--                <label class="block mb-1">Skill</label>--}}
{{--                <input type="text" name="title" x-model="formData.title" class="w-full border p-2 rounded" required>--}}

{{--                @error('title')--}}
{{--                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>--}}
{{--                @enderror--}}
{{--            </div>--}}

{{--            <!-- Modal Actions -->--}}
            <div class="flex justify-end">
                <button
                    type="button"
                    class="bg-gray-300 px-4 py-2 rounded mr-2"
                    @click="{{ $onClose }}"
                >
                    Cancel
                </button>
            </div>
{{--        </form>--}}
    </div>
</div>

