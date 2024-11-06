<?php

namespace App\Http\Controllers\Member;

use App\Models\UserProgramSchedule;
use Illuminate\Routing\Controller;

class UserProgramScheduleController extends Controller
{
    public function index(string $id)
    {

        $program_schedule = UserProgramSchedule::with('exercises')->find($id);
        return view('member.program_schedule.index', [
            'program_schedule' => $program_schedule,
        ]);
    }
}
