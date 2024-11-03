<?php

namespace App\Http\Controllers\Member;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('member/index', [
            'user' => $user
        ]);
    }

}
