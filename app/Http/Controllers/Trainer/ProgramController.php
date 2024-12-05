<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Exercise;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProgramController extends Controller
{
    public function index()
    {
        //fetch
        $programs = Program::with('user')
            ->orderByRaw("FIELD(level, 'beginner', 'intermediate', 'advanced')")
            ->paginate(15);
        return view('trainer/program/index', [
            'programs' => $programs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //validate
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
            $path = $photo_link->storeAs($destination_path, $image_name);

            // Save the file name in the input array
            $input['photo_link'] = $path;
        }

        $program = Program::create($input);

        return redirect('/trainer/programs')->with('success', $program->name . ' added.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $program = Program::with(relations: ['program_schedules' => ['exercises']])
            ->findOrFail($id);

        $exercises = Exercise::all();

        return view('trainer.program.show', [
            'program' => $program,
            'exercises' => $exercises,
        ]);
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect()->back();
    }
}
