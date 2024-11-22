<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FeedbackController extends Controller
{
    public function index(){

        $feedbacks = Feedback::with('user')->get();


        return view('admin.feedback.index', [
            'feedbacks' => $feedbacks
        ]);
    }
}
