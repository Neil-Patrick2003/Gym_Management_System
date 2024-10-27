<?php

namespace App\Http\Controllers\Admin;

use App\Models\DailyExercises;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DailyExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $exercise_ids = $request->exercise_ids;


        foreach ($exercise_ids as $exercise_id) {
            DailyExercises::create([
                'program_schedule_id' => $request->program_schedule_id,
                'exercise_id' => $exercise_id
            ]);
        }

        return back();

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
