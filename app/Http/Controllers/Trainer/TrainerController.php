<?php

namespace App\Http\Controllers\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::where('role', '=', 'Member')->get();
        return view('trainer/index', [
            'members' => $members
        ]);
    }

    public function tutorials()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
