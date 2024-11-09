<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use App\Models\Exercise;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{

    public function index()
    {

        // $user_id = Auth::id();
        // $user_programs = UserProgram::with(relations: 'program_schedules')->where('user_id', '=', $user_id)
        //     ->oldest()
        //     ->limit(5)
        //     ->get();

        

        $programs = Program::with('user')->paginate(15);

        return view('admin/programs/index', [
            'programs' => $programs,
            
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
            $path = $photo_link->storeAs($destination_path, $image_name);

            // Save the file name in the input array
            $input['photo_link'] = $path;
        }

        Program::create($input);

        return redirect('admin/programs');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $program = Program::with(relations: ['program_schedules' => ['exercises']])
            ->findOrFail($id);

        $exercises = Exercise::all();

        return view('admin.programs.show', [
            'program' => $program,
            'exercises' => $exercises,
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
