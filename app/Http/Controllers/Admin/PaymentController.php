<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PaymentRequest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['user', 'items'])
            ->orderBy('created_at', 'desc')
            ->get();

        $members = User::where('role', '=', 'Member')->get();
        $trainers = User::where('role', '=', 'Trainer')->get();

        return view('admin.payment.index', [
            'members' => $members,
            'trainers' => $trainers,
            'transactions' => $transactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PaymentRequest $request)
    {
        $plans = collect([
            [
                "name" => "Daily",
                "days" => 1,
                "price" => 40,
                "discounted_price" => 35
            ],
            [
                "name" => "Weekly",
                "days" => 7,
                "price" => 200,
                "discounted_price" => 200
            ],
            [
                "name" => "Monthly",
                "days" => 30,
                "price" => 700,
                "discounted_price" => 600
            ]
        ]);

        $transaction = Transaction::create([
            'status' => 'Paid',
            'user_id' => $request->post('user_id'),
            'is_student' => $request->has('student_discount')
        ]);

        $total = 0;

        if ($request->post('trainer_hours', 0) > 0 && $request->post('trainer_id')) {
            $subTotal = ($request->post('trainer_hours', 0) * 30);

            $total =  $total + $subTotal;

            $transaction->items()->create([
                'trainer_id' => $request->post('trainer_id'),
                'amount' => 30,
                'description' => 'Payment for Trainer for ' . $request->post('trainer_hours', 0) . ' hours',
                'quantity' => $request->post('trainer_hours', 0),
                'sub_total' => $subTotal
            ]);

        }

        if ($request->post('plan')) {
            $plan = $plans->where('name', $request->post('plan'))->first();

            if ($plan) {
                $subTotal = $request->has('student_discount') ? $plan['discounted_price'] : $plan['price'];

                $user = User::find($request->post('user_id'));

                $user->setAdditionalPaidUntil($plan['days']);

                $total =  $total + $subTotal;

                $transaction->items()->create([
                    'amount' => $subTotal,
                    'quantity' => 1,
                    'description' => 'Gym session for ' . $request->post('plan'),
                    'sub_total' => $subTotal
                ]);
            }
        }


        $transaction->update(['amount' => $total]);


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
