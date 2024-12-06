<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Appointment;
use App\Models\Recommendation;
use App\Models\Timesheet;
use App\Models\TransactionItem;
use App\Models\User;
use Carbon\Carbon;
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

        $total_accepted_appointments = Appointment::whereStatus('Accepted')
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
                "value" => "Php $total_sales",
            ],
            [
                "title" => "Total logged hours",
                "value" => "$logged_timesheet->total_hours H $logged_timesheet->total_minutes mins",
            ],
            [
                "title" => "Total Appointments",
                "value" => $total_accepted_appointments,
            ],
            [
                "title" => "Total Recommendations",
                "value" => $total_recommendations,
            ],
        ];


        $salesData = TransactionItem::selectRaw('SUM(sub_total) as total_sales, DATE(created_at) as date')
            ->where('trainer_id', Auth::id())
            ->whereMonth('created_at', Carbon::now()->month) // Fetch data for the current month
            ->whereYear('created_at', Carbon::now()->year) // Filter by current year
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // Get the current date and the start of the month
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now(); // End date is today (not the end of the month)

        // Generate an array of all dates from the start of the month up to today
        $allDates = [];
        $dates = [];
        $sales = [];

        // Loop through each day from the start of the month to today
        for ($date = $startOfMonth; $date <= $endOfMonth; $date->addDay()) {
            $allDates[] = $date->format('Y-m-d'); // Format the date as 'Y-m-d'
        }

        // Loop through the generated dates and match it with sales data
        foreach ($allDates as $date) {
            $found = false;
            foreach ($salesData as $data) {
                if ($data->date == $date) {
                    // If sales data is found, add it to the sales array
                    $dates[] = $date;
                    $sales[] = $data->total_sales;
                    $found = true;
                    break;
                }
            }

            // If no sales data found for this date, add 0 (only for past dates)
            if (!$found) {
                $dates[] = $date;
                $sales[] = 0;
            }
        }

        // Get the current month's name (e.g., "December")
        $currentMonth = Carbon::now()->format('F');

        return view('trainer/index', [
            'members' => $members,
            'stats' => $stats,
            'dates' => $dates, // Pass all dates data
            'sales' => $sales, // Pass daily sales data (including 0 for days with no sales)
            'currentMonth' => $currentMonth, // Pass current month for the title
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
