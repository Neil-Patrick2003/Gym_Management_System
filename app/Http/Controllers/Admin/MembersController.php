<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class MembersController extends Controller
{

    public function index()
    {
        $members = User::all();
        return view('admin.member', [
            'members' => $members
        ]);
    }


    public function edit(string $id)
    {
        $data = request()->validate([
            'role' => 'required|in:Admin,Member,Trainer'
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'role' => request('role'),
        ]);


        return redirect('/admin/members')->with('success', 'Role updated sucessfully');
    }
}
