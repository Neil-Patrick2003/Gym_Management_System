<?php

namespace App\Http\Controllers\Member;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProgramController extends Controller
{

    public function index()
    {
        //fetch
        $programs = Program::with('user')->paginate(15);

        return view('member.program/index', [
            'programs' => $programs,
        ]);
    }

    public function show(string $id)
    {
        $program = Program::with(relations: ['program_schedules' => ['exercises']])
            ->findOrFail($id);

        return view('member.program.show', [
            'program' => $program
        ]);
    }

}
