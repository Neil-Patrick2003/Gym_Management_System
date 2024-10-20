<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Programs;
use App\Models\ProgramSchedule;
use Illuminate\Http\Request;

class ProgramController extends Controller
{

    public function index()
    {

        $programs = Programs::with('user')->paginate(15);

        return view('admin/programs/index', [
            'programs' => $programs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/program/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'photo_link' => 'required|file|mimes:jpg,png,svg,pdf|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('photo_link')) {
            // Specify the destination path without 'public/' prefix
            $destination_path = 'images/programs';

            // Get the uploaded file
            $photo_link = $request->file('photo_link');

            // Use the correct variable name here for getting the original name
            $image_name = $photo_link->getClientOriginalName();

            // Store the file using the correct input name
            $path = $photo_link->storeAs($destination_path, $image_name); // Fixed here: use $photo_link instead of $request->file('image')

            // Save the file name in the input array
            $input['photo_link'] = $path;
        }

        Programs::create($input);

        return redirect('admin/programs');
    }

    /**
     * Display the specified resource.
     */
    public function show( Programs $program)
    {

        $program_schedules = ProgramSchedule::all();
        return view('admin.programs.show', [
            'program' => $program,
            'program_schedules' => $program_schedules
        ]);
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
