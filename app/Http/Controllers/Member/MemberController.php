<?php

namespace App\Http\Controllers\Member;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::limit(10)->get();

        
        $trainers = User::where('role', '=', 'Trainer')->get();
        
        $user = Auth::user();

        return view('member/index', [
            'user' => $user,
            'trainers' => $trainers,
            'programs' => $programs
        ]);
    }

}
