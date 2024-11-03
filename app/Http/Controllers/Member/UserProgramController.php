<?php

namespace App\Http\Controllers\Member;

use App\Models\Program;
use App\Models\UserProgram;
use App\Models\UserProgramDailyExercise;
use App\Models\UserProgramSchedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //retrieve program
        $program = Program::with(relations: ['program_schedules' => ['exercises']])
            ->findOrFail($request->program_id);

        //program store in user program
        $user_program = UserProgram::create([
            'user_id' => Auth::id(),
            'program_id' => $program->id
        ]);

        //foreach program schedule store in user program schedule
        foreach ($program->program_schedules as $program_schedules) {
            $user_schedule = UserProgramSchedule::create([
                'name' => $program_schedules->name,
                'user_program_id' => $user_program->id,
            ]);

            //to reset the array in every loop
            $exercises = [];

            //to store each exercise 
            foreach($program_schedules->exercises as $exercise){
                $exercises[$exercise->id] = ['is_complete' => false];
    
            }
    
            $user_schedule->user_exercises()->sync($exercises);

        }

        return back();

        

        

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
