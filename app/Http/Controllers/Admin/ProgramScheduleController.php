<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\ProgramSchedule;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProgramScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($programId)
    {

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

        $request->validate([
            'name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id', // Assuming you have a programs table
        ]);

        // Create a new program schedule
        $program_schedule = ProgramSchedule::create([
            'name' => $request->name,
            'program_id' => $request->program_id,
        ]);

        return redirect("/admin/programs/{$program_schedule->program_id}");

    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program, Request $request)
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

    }
}
