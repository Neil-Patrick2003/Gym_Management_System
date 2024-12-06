<?php

namespace App\Http\Controllers\Member;

use App\Models\Category;
use App\Models\Program;
use App\Models\Timesheet;
use App\Models\Tutorial;
use App\Models\User;
use Carbon\Carbon;
use function Pest\Laravel\get;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::limit(10)->get();

        $trainers = User::availableTrainer()->get();

        $user = Auth::user();

        $current_timesheet = Timesheet::where('user_id', Auth::id())
            ->with(['trainer'])
            ->whereNull('end_time')
            ->latest()
            ->first();

        $totayLogs = Timesheet::where('user_id', Auth::id())
            ->with('trainer')
            ->whereDate('start_time', Carbon::now())
            ->get();


        return view('member/index', [
            'user' => $user,
            'trainers' => $trainers,
            'programs' => $programs,
            'current_timesheet' => $current_timesheet,
            'totay_logs' => $totayLogs
        ]);
    }

    public function tutorials()
    {

        $categories = Category::all();

        $tutorials = Tutorial::orderBy('created_at', 'desc')->get();


        return view('member.tutorial.index', [
            'categories' => $categories,
            'tutorials' => $tutorials
        ]);
    }

}
