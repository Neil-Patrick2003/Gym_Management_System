<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $total_trainers = User::trainer()->count();
        $total_members = User::member()->count();
        $total_accepted_appointments= Appointment::whereStatus('Accepted')->count();

        $logged_timesheet = Timesheet::selectRaw('SUM(TIMESTAMPDIFF(HOUR, start_time, end_time)) as total_hours,
                                   SUM(TIMESTAMPDIFF(MINUTE, start_time, end_time) % 60) as total_minutes')
            ->whereNotNull('end_time')
            ->first();

        $total_programs = Program::count();
        $total_exercise = Exercise::count();
        $user_enrolled_programs = UserProgram::count();
        $total_sales = TransactionItem::sum('sub_total');

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
                "title" => "Total programs",
                "value" => $total_programs
            ],
            [
                "title" => "User enrolled program",
                "value" => $user_enrolled_programs
            ],
            [
                "title" => "Total exercises",
                "value" => $total_exercise
            ],
            [
                "title" => "Total logged hours",
                "value" => "$logged_timesheet->total_hours H $logged_timesheet->total_minutes mins"
            ]
        ];

        return view('admin/index', [
            'user' => $user,
            'stats' => $stats
        ]);
    }
}
