<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Appointment;
use App\Models\Exercise;
use App\Models\Program;
use App\Models\Timesheet;
use App\Models\TransactionItem;
use App\Models\User;
use App\Models\UserProgram;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch the logged-in user
        $user = Auth::user();

        // Fetch role counts
        $roles = DB::table('users')
            ->select('role', DB::raw('COUNT(*) as count'))
            ->groupBy('role')
            ->get();

        // Prepare role counts for easy access
        $roleCounts = [];
        foreach ($roles as $role) {
            $roleCounts[strtolower($role->role)] = $role->count;
        }

        // Fetch programs
        $programs = DB::table('programs')
            ->select('name', DB::raw('COUNT(*) as count'))
            ->groupBy('name')
            ->get();

        // Fetch other stats
        $total_trainers = User::trainer()->count();
        $total_members = User::member()->count();
        $total_accepted_appointments = Appointment::whereStatus('Accepted')->count();
        $logged_timesheet = Timesheet::selectRaw('SUM(TIMESTAMPDIFF(HOUR, start_time, end_time)) as total_hours,
                                   SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time) % 60) as total_minutes')
            ->whereNotNull('end_time')
            ->first();
        $total_programs = Program::count();
        $total_exercise = Exercise::count();
        $user_enrolled_programs = UserProgram::count();
        $total_sales = TransactionItem::sum('sub_total');

        // Fallback values if timesheet is empty
        $logged_timesheet->total_hours = $logged_timesheet->total_hours ?? 0;
        $logged_timesheet->total_minutes = $logged_timesheet->total_minutes ?? 0;

        // Stats for the dashboard
        $stats = [
            [
                "title" => "Total Sales",
                "value" => "Php $total_sales"
            ],
            [
                "title" => "Total Members",
                "value" => $total_members
            ],
            [
                "title" => "Total Trainers",
                "value" => $total_trainers
            ],
            [
                "title" => "Total Appointments",
                "value" => $total_accepted_appointments
            ],
            [
                "title" => "Total Programs",
                "value" => $total_programs
            ],
            [
                "title" => "User Enrolled Programs",
                "value" => $user_enrolled_programs
            ],
            [
                "title" => "Total Exercises",
                "value" => $total_exercise
            ],
            [
                "title" => "Total Logged Hours",
                "value" => "$logged_timesheet->total_hours H $logged_timesheet->total_minutes mins"
            ]
        ];

        // Fetch individual transactions
        $transactions = DB::table('transactions')
            ->select('created_at', 'amount')
            ->orderBy('created_at', 'asc')
            ->get();

        // Fetch appointment status counts
        $appointmentStatuses = Appointment::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->get();

        // Prepare status counts for easy access
        $statusCounts = [];
        foreach ($appointmentStatuses as $status) {
            $statusCounts[strtolower($status->status)] = $status->count;
        }

        // Fetch recommendation counts grouped by type
$recommendationCounts = DB::table('recommendations')
->select('type', DB::raw('COUNT(*) as count'))
->groupBy('type')
->get();



       // Return the data to the view
return view('admin/index', [
    'user' => $user,
    'stats' => $stats,
    'roles' => $roles,
    'programs' => $programs,
    'roleCounts' => $roleCounts,
    'transactions' => $transactions,
    'statusCounts' => $statusCounts,
    'recommendationCounts' => $recommendationCounts,  // Pass the counts of recommendations by type
]);

    }
}
