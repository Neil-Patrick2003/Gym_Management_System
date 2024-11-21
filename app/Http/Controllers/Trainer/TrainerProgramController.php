<?php

namespace App\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TrainerProgramController extends Controller
{
    public function index(){
        return view('trainer.program.index');
    }
}
