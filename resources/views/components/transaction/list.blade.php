<div class="md:col-span-2 p-4 text-white">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold text-gray-900">Recent Transactions</h1>
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
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Breakdown
                            </th>
                            <th scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date
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
                                        Php{{ $transaction->amount }}
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <ul class="text-gray-900 list-disc">
                                        @foreach($transaction->items as $item)
                                            <li>
                                                {{$item->description}} (Php {{$item->sub_total}})
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                    <div class="text-gray-900">
                                        {{ \Carbon\Carbon::parse($transaction->created_at)->format('M d, Y') }}
                                    </div>

                                </td>
                                <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <span
                                                    class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{ $transaction->status }}</span>
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
