<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RecommendationController extends Controller
{
    public function index(){
        return view('member.recommendation.index');
    }
}
