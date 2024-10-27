<?php

namespace App\Http\Controllers\Admin;

use App\Models\Exercises;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExercisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exercises = Exercises::paginate(10);

        return view('admin.exercises.index', [
            'exercises' => $exercises,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exercises.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        dump(request()->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'no_of_sets' => 'required|integer',
            'no_of_reps' => 'required|integer',
            'tutorial_link' => 'required|file|mimes:mp4,mov,avi',
            'photo_link' => 'required|file|mimes:jpg,png,svg,pdf',
        ]);


        $input = $request->all();

        if ($request->hasFile('photo_link')) {
            $destination_path = 'images/exercies';
            $photo_link = $request->file('photo_link');
            $image_name = $photo_link->getClientOriginalName();
            $path = $photo_link->storeAs($destination_path, $image_name);
            $input['photo_link'] = $path;
        }

        if ($request->hasFile('tutorial_link')) {
            $destination_path = 'videos/tutorials';
            $tutorial_link = $request->file('tutorial_link');
            $video_name = $tutorial_link->getClientOriginalName();
            $path = $tutorial_link->storeAs($destination_path, $video_name);
            $input['tutorial_link'] = $path;
        }

        Exercises::create($input);

        return redirect('admin/exercises');

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
