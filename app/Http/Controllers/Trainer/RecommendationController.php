<?php

namespace App\Http\Controllers\Trainer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recommendation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class RecommendationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('role', '=', 'Member')->get();


        

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
        $recommendations = Recommendation::where( 'user_id', '=', $id)->get();

        return view('trainer.recommendation.create', [
            'member' => $member,
            'recommendations' => $recommendations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {

        $trainerId = Auth::id(); // or $user->id

        $request->validate([
            'content' => 'required|min:20',
        ]);


            $editorContent = $request->input('content');


        Recommendation::create([
            'user_id' => $id,
            'trainer_id' => $trainerId,
            'content' => $request->content,
            'type' => $request->category

        ]);

        return redirect()->back()->with('sucess', 'sucessfully');
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
