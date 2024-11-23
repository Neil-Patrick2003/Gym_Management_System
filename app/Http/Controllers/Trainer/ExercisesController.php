<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Exercise;
use Illuminate\Routing\Controller;

class ExercisesController extends Controller
{
    public function index()
    {

        $exercises = Exercise::paginate(10);

        return view('trainer.exercises.index', [
            'exercises' => $exercises,
        ]);
    }

    public function create(){
        return view(view: 'trainer.exercises.create');
    }
}
