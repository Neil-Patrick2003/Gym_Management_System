<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Appointment;
use App\Models\Exercise;
use App\Models\Program;
use App\Models\Recommendation;
use App\Models\Timesheet;
use App\Models\TransactionItem;
use App\Models\User;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::member()->get();

        $total_accepted_appointments= Appointment::whereStatus('Accepted')
            ->where('trainer_id', Auth::id())
            ->count();

        $logged_timesheet = Timesheet::selectRaw('SUM(TIMESTAMPDIFF(HOUR, start_time, end_time)) as total_hours,
                                   SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time) % 60) as total_minutes')
            ->whereNotNull('end_time')
            ->where('trainer_id', Auth::id())
            ->first();

        $total_sales = TransactionItem::where('trainer_id', Auth::id())->sum('sub_total');
        $total_recommendations = Recommendation::where('trainer_id', Auth::id())->count();


        $logged_timesheet->total_hours = $logged_timesheet->total_hours ?? 0;
        $logged_timesheet->total_minutes = $logged_timesheet->total_minutes ?? 0;

        $stats = [
            [
                "title" => "Total Sales",
                "value" => "Php $total_sales"
            ],
            [
                "title" => "Total logged hours",
                "value" => "$logged_timesheet->total_hours H $logged_timesheet->total_minutes mins"
            ],
            [
                "title" => "Total Appointments",
                "value" => $total_accepted_appointments
            ],
            [
                "title" => "Total Recommendations",
                "value" => $total_recommendations
            ],
        ];

        return view('trainer/index', [
            'members' => $members,
            'stats' => $stats
        ]);
    }

    public function tutorials()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
