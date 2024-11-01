<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::all();
        return view('admin.member', [
            'members' => $members,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function edit(string $id, Request $request)
    {
        $data = request()->validate([
            'role' => 'required|in:Admin,Member,Trainer',
        ]);

        $trainerCount = User::where('role', 'Trainer')->count();

        $user = User::findOrFail($id);

        $user->update([
            'role' => request('role'),
            'trainer' => $trainerCount
        ]);

        return redirect('/admin/members')->with('sucess', 'role updated sucessfully!');


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
