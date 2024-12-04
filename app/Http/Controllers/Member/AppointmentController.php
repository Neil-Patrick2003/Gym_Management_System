<?php

namespace App\Http\Controllers\Member;

use App\Http\Requests\Member\CreateAppointmentRequest;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function index()
    {
        $events = [];

        $trainers = User::where('role', '=', 'Trainer')->get();

        $appointments = Appointment::with('trainer', 'user')
            ->where('user_id', '=', Auth::id())
            ->get();

        foreach ($appointments as $appointment) {
            if ($appointment->status === 'Pending' && Carbon::now()->greaterThan(Carbon::parse($appointment->end_time))) {
                $appointment->status = 'Expired';
                $appointment->save();
            }


            $events[] = [
                'title' => $appointment->trainer->name . ' (' . $appointment->user->name . ')',
                'start' => $appointment->start_time, // Assumes this is a datetime field
                'end' => $appointment->finish_time, // Assumes this is a datetime field
            ];
        }

        return view('member.appoinment.index', [
            'trainers' => $trainers,
            'appointments' => $appointments,
            'events' => $events
        ]);
    }

    public function store(CreateAppointmentRequest $request)
    {

        $start = request()->start_time;
        $end = request()->end_time;
        $user_id = Auth::id();

        // Parse the datetime strings into Carbon instances
        $start_time = Carbon::parse($start);
        $end_time = Carbon::parse($end);

        Appointment::create([
            'user_id' => $user_id,
            'trainer_id' => $request->trainer_id,
            'start_time' => $start_time,
            'end_date' => $end_time,
            'status' => 'Pending',
        ]);

        return redirect()->back()->withMessage(['message' => 'Appointment completed.']);
    }

}
