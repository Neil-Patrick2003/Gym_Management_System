<?php

namespace App\Http\Controllers\Member;

use App\Models\Appoinment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        //fetch trainers to pass the value in combo box choose in trainers to appoint
        $trainers = User::where('role', '=', 'Trainer')->get();

        //fetch appoinments in authenticated user with eagerload the trainer
        $appointments = Appoinment::with('trainer')
            ->where('user_id', '=', Auth::id())
            ->get();

        foreach ($appointments as $appointment) {
            if ($appointment->status === 'Pending' && Carbon::now()->greaterThan(Carbon::parse($appointment->end_time))) {
                $appointment->status = 'Expired';
                $appointment->save();
            }
        }

        return view('member.appoinment.index', [
            'trainers' => $trainers,
            'appointments' => $appointments,
        ]);
    }

    public function store(Request $request)
    {

        $start = request()->start_time;
        $end = request()->end_time;
        $user_id = Auth::id();

        $validated = $request->validate([
            'trainer_id' => 'required',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',

        ]);

        // Parse the datetime strings into Carbon instances
        $start_time = Carbon::parse($start);
        $end_time = Carbon::parse($end);

        $duration = $start_time->diffInHours($end_time);

        if ($duration >= 3) {
            return redirect()->back()->withErrors(['error' => 'Appointments cannot be longer than 3 hours.']);
        }

        $appointment = Appoinment::create([
            'user_id' => $user_id,
            'trainer_id' => $request->trainer_id,
            'start_time' => $start_time,
            'end_date' => $end_time,
            'status' => 'Pending',
        ]);

        return redirect()->back()->withMessage(['message' => 'Appointment completed.']);
    }

}
