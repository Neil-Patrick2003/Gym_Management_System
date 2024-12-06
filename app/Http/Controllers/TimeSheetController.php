<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Timesheet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeSheetController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function checkin(Request $request)
    {
        $start_time = Carbon::now();

        Timesheet::create([
            'user_id' => Auth::id(),
            'trainer_id' => $request->post('trainer_id'),
            'start_time' => $start_time,
        ]);

        return redirect()->back();
    }

    public function checkout(Timesheet $timesheet)
    {
        $timesheet->update(['end_time' => Carbon::now()]);

        return redirect()->back();
    }

    public function addTrainer(Request $request, Timesheet $timesheet)
    {
        $timesheet->update(['end_time' => Carbon::now()]);

        Timesheet::create([
            'user_id' => Auth::id(),
            'trainer_id' => $request->post('trainer_id'),
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back();
    }

    public function removeTrainer(Timesheet $timesheet)
    {
        $timesheet->update(['end_time' => Carbon::now()]);

        Timesheet::create([
            'user_id' => Auth::id(),
            'trainer_id' => null,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}
