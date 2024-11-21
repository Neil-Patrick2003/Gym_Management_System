<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\UserProgramDailyExercise;
use App\Models\UserProgramSchedule;
use Illuminate\Http\Request;

class UserProgramDailyExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {

        $program_schedule = UserProgramSchedule::with('exercises')->find($id);

        return view('member.user_program_daily_exercise.index', [
            'program_schedule' => $program_schedule,
        ]);


    }

    public function create()
    {
        //
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
    public function update(Request $request, $user_program_schedule_id, $exercise_id)
    {

        $user_program_daily_exercise = UserProgramDailyExercise::where('user_program_schedule_id', '=', $user_program_schedule_id)
        ->where('exercise_id', $exercise_id)
        ->first();

        $user_program_daily_exercise->is_complete = true;
        $user_program_daily_exercise->save();



        return redirect()->back()->with('success', 'Completed!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
