<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Models\Recommendation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    public function index(){

        $food_recommendations = Recommendation::with('user', 'trainer')
        ->where('user_id', '=', Auth::id())
        ->where('type', '=', 'Food Recommendation' )
        ->get();

        $supplement_recommendations = Recommendation::with('user', 'trainer')
        ->where('user_id', '=', Auth::id())
        ->where('type', '=', 'Supplement Recommendation' )
        ->get();
        
        return view('member.recommendation.index', [
            'food_recommendations' => $food_recommendations,
            'supplement_recommendations' => $supplement_recommendations
        ]);
    }
}
