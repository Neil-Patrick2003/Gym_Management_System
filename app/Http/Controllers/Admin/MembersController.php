<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Routing\Controller;

class MembersController extends Controller
{

    public function index()
    {

        $members = User::where('role', '=', 'Member')
            ->get();

        return view('admin.member.index', [
            'members' => $members
        ]);
    }

    public function show($id){

        $member = User::findOrFail($id);

        return view('admin.member.show', [
            'member' => $member
        ]);
    }

    public function edit(string $id)
    {

    }
}
