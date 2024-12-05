<x-app-layout>
    <div class="grid grid-cols-1 p-2 gap-4 md:grid-cols-3">

        <div class="md:col-span-1 bg-red-700 rounded-lg p-4 text-white flex justify-center items-center">
            <div class="w-full max-w-xs" x-data="paymentForm()">

                {{-- form --}}
                <form action="/admin/payments" method="POST" class="max-w-sm mx-auto bg-red-700 p-4 rounded-lg">
                    @csrf

                    <div>
                        <label for="user_id" class="block mb-2 text-sm font-medium text-white">Select Member</label>
                        <select id="user_id" name="user_id"
                                x-model="selectedUserId"
                                class="block w-full p-2 mb-6 text-sm text-gray-600 border border-white rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 ">
                            <option value="">Select Member</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>

                        <p x-show="selectedUser && selectedUser?.is_paid_today">
                            User is paid until: <span x-text="selectedUser?.paid_until"></span>
                        </p>

                        @error('user_id')
                        <div class=" mb-4 text-sm text-white rounded-lg " role="alert">
                            <span class="font-sm italic">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>

                    {{-- Trainer Payment--}}
                    <div x-show="selectedUser" class="space-y-4">
                        <div class="space-y-4" x-show="!selectedUser?.is_paid_today">
                            <div>
                                <fieldset class="space-y-4 p-0">
                                    <template x-for="plan in plans" :key="plan.name">
                                        <label class="flex items-center cursor-pointer p-2 bg-white border rounded-lg hover:bg-gray-100">
                                            <input type="radio"
                                                   name="plan"
                                                   :value="plan.name"
                                                   x-model="selectedPlanName"
                                                   class="mr-3">
                                            <div>
                                                <span class="font-medium text-gray-900" x-text="plan.name"></span>
                                                <p class="text-sm text-gray-500">
                                                    Price: PHP <span x-text="studentDiscount ? plan.discounted_price : plan.price"></span>
                                                </p>
                                            </div>
                                        </label>
                                    </template>
                                </fieldset>
                            </div>

                            <div class="flex items-center mb-4">
                                <input type="checkbox"
                                       id="student-discount"
                                       name="student_discount"
                                       x-model="studentDiscount"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="student-discount" class="ml-2 text-sm text-white">
                                    Apply Student Discount
                                </label>
                            </div>
                        </div>

                        <div>
                            <div>
                                <select id="trainer_id" name="trainer_id" x-model="selectedTrainer"
                                        class="block w-full p-2 mb-6 text-sm text-gray-600 border border-white rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 ">
                                    <option value="">Select Trainer</option>
                                    @foreach ($trainers as $trainer)
                                        <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <input id="trainer_hours" name="trainer_hours" type="number"
                                       x-model="trainer_hours"
                                       placeholder="No. of Hours"
                                        class="block w-full p-2 mb-6 text-sm text-gray-600 border border-white rounded-lg bg-white focus:ring-blue-500 focus:border-blue-500 "/>
                                <span>Trainer fee is Php 30.00 per hour</span>
                            </div>
                        </div>
                    </div>

                    <p>Total: <span x-text="total"></span></p>

                    <button type="submit"
                            class="text-white mt-4 w-full bg-gray-800 hover:bg-500 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center justify-center dark:focus:ring-gray-500 dark:hover:bg-[#050708]/30 me-2 mb-2">
                        Confirm Payment
                    </button>
                </form>

            </div>
        </div>


        <x-transaction.list :transactions="$transactions"/>
    </div>

    <script>
        function paymentForm() {
            return {
                users: @json($members),
                selectedUserId: '',
                selectedPlanName: null,
                studentDiscount: false,
                selectedTrainer: "",
                trainer_hours: 0,
                plans: [
                    {
                        name: "Daily",
                        days: 1,
                        price: 40,
                        discounted_price: 35
                    },
                    {
                        name: "Weekly",
                        days: 7,
                        price: 200,
                        discounted_price: 200
                    },
                    {
                        name: "Monthly",
                        days: 30,
                        price: 700,
                        discounted_price: 600
                    }
                ],
                get selectedUser() {
                    return this.users.find(user => user.id == this.selectedUserId) || null;
                },
                get selectedPlan() {
                    return this.plans.find(p => p.name === this.selectedPlanName)
                },
                get selectedUserHasSessionPaid() {
                    return !!this.users.find(user => user.id == this.selectedUserId)?.paid_until;
                },
                get selectedUserPaidUntil() {
                    const paid_until = this.users.find(user => user.id == this.selectedUserId)?.paid_until;

                    return paid_until ? `Paid until ${paid_until}` : 'No session paid';
                },
                get total() {
                    let total = 0;

                    if (this.trainer_hours > 0 && this.selectedTrainer) {
                        total = (this,this.trainer_hours * 30) + total;
                    }

                    if (this.selectedPlanName) {
                        const plan = this.plans.find(p => p.name === this.selectedPlanName);

                        if (plan) {
                            total = total + (this.studentDiscount ? plan.discounted_price : plan.price)
                        }
                    }

                    return total
                }
            };
        }
    </script>


</x-app-layout>
