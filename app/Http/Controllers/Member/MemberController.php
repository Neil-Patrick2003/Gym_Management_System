<?php

namespace App\Http\Controllers\Member;

use App\Models\Category;
use App\Models\Program;
use App\Models\Tutorial;
use function Pest\Laravel\get;
use Illuminate\Foundation\Auth\User;
use Illuminate\Routing\Controller;
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
            'programs' => $programs,
        ]);
    }

    public function tutorials()
    {

        $categories = Category::all();

        $tutorials = Tutorial::orderBy('created_at', 'desc')->get();

       
        return view('member.tutorial.index', [
            'categories' => $categories,
            'tutorials' => $tutorials
        ]);
    }

}
