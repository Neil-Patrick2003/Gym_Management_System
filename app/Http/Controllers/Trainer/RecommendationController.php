<?php

namespace App\Http\Controllers\Trainer;

use App\Models\Recommendation;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('role', '=', 'Member')->get();

        // dd($members->toArray());

        return view('trainer.recommendation.index', [
            'members' => $members
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

        $member = User::find($id);

        return view('trainer.recommendation.create', [
            'member' => $member
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $trainerId = FacadesAuth::id(); // or $user->id
        $request->validate([
            'user_id' => 'required',
            'trainer_id' => 'required',
            'content' => 'required|max:9999|min:20',
            'type' => 'required'
        ]);

        $recommendations = Recommendation::create([
            'user_id' => $id,
            'trainer_id' => $trainerId,
            'content' => $request->content,
            'type' => $request->category

        ]);

        return redirect('/trainer/recommendations')->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
