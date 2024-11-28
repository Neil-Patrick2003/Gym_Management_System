<?php

namespace App\Http\Controllers\Admin;

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

        $transactions = Transaction::with('user')
            ->orderBy('created_at', 'desc')
            ->get();

        $members = User::where('role', '=', 'Member')->get();
        return view('admin.payment.index', [
            'members' => $members,
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
    public function store(Request $request)
    {

        $isStudent = filter_var($request->input('is_student'), FILTER_VALIDATE_BOOLEAN);

        $request->merge([
            'is_student' => $isStudent,
        ]);

        $request->validate([
            'user_id' => 'required',
            'plan' => 'required|in:daily,weekly,monthly',
            'is_student' => 'required|boolean',
            'amount' => 'required|regex:/^\d+(\.\d{2})$/',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',

        ]);

        $status = "paid";

        Transaction::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'plan' => $request->plan,
            'status' => $status,
            'startDate' => $request->start,
            'end_date' => $request->end,
            'is_student' => $request->is_student,
        ]);

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
