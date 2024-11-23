<x-app-layout>
    <div class="grid grid-cols-1 p-2 gap-4 md:grid-cols-3">

        <div class="md:col-span-1 bg-red-700 rounded-lg p-4 text-white flex justify-center items-center">
            <div class="w-full max-w-xs">

                {{-- form --}}
                <form action="/admin/payments" method="POST" class="max-w-sm mx-auto bg-red-700 p-4 rounded-lg">
                    @csrf

                    {{-- user_id --}}
                    <label for="user_id" class="block mb-2 text-sm font-medium text-white">Select Member</label>
                    <select id="user_id" name="user_id"
                        class="block w-full p-2 mb-6 text-sm text-red-600 border border-white rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                    @enderror

                    {{-- session plan --}}
                    <label for="plan" class="block mb-2 text-sm font-medium text-white">Default select</label>
                    <select id="plan" name="plan"
                        class="bg-white border border-gray-300 text-thite mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a sesssion plan</option>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                    </select>

                    @error('plan')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                    @enderror


                    {{-- is_student --}}

                    <label for="is_student" class="block mb-2 text-base font-medium text-white">Select Discount</label>
                    <select id="is_student" name="is_student"
                        class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>None</option>
                        <option value="true">Student Discount</option>
                        <option value="false">None</option>
                    </select>

                    @error('is_student')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                    @enderror


                    <div>
                        <label for="amount"
                            class="block mb-2 mt-4 text-sm font-medium text-gray-900 dark:text-white">Amount</label>
                        <input type="text" id="amount" name="amount"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="00.00" required />
                    </div>

                    @error('amount')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                    @enderror


                    <div id="date-range-picker" class="flex items-center mt-4">
                        <div class="relative">
                            <label for="start_date" class="block mb-2 text-sm font-medium text-white">Start Date</label>
                            <input id="start_date" name="start" type="date"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <span class=" text-red-600">-</span>
                        <div class="relative">
                            <label for="end_date" class="block mb-2 text-sm font-medium text-white">End Date</label>
                            <input id="end_date" name="end" type="date"
                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                    </div>

                    @error('end')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                    @enderror


                    <button type="submit"
                        class="text-white mt-4 w-full bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">
                        Confirm Payment
                    </button>

                </form>
            </div>
        </div>



        <div class="md:col-span-2 p-4 text-white">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold text-gray-900">All Payments</h1>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                            Name</th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Plan
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Start Date
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">End Date
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                                <div class="flex items-center">
                                                    <div class="size-11 shrink-0">
                                                        <img class="size-11 rounded-full"
                                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIEY21qcAFAMli4-I8OVcd9C-BmszpY1MqnA&s0"
                                                            alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="font-medium text-gray-900">
                                                            {{ $transaction->user->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">
                                                    {{ $transaction->plan }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">
                                                    {{ \Carbon\Carbon::parse($transaction->start)->format('M d, Y') }}
                                                </div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">
                                                    {{ \Carbon\Carbon::parse($transaction->end)->format('M d, Y') }}
                                                </div>

                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{$transaction->status}}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</x-app-layout>
