<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    
    public function index(){
        return view('member.feedback.index');
    }

    public function store(Request $request){
        $admin = User::where('role', '=', 'Admin')->first();

        $request->validate([
            'message' => 'required| max:255'
        ]);

        Feedback::create([
            'user_id' => Auth::id(),
            'trainer_id' => $admin->id,
            'content' => request('message'),
            'rating' => 5
        ]);

        return redirect()->back()->with('success', 'Feedback sent!');

    }
}
