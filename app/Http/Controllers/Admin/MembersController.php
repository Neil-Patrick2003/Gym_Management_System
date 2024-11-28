<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Routing\Controller;

class MembersController extends Controller
{

    public function index()
    {

        $all_members = User::where('role', '=', 'Member')->count();

        $members = User::where('role', '=', 'Member')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.member.index', [
            'members' => $members,
            'all_members' => $all_members,
        ]);
    }

    public function show($id)
    {

        $member = User::findOrFail($id);

        return view('admin.member.show', [
            'member' => $member,
        ]);
    }

    public function edit(string $id)
    {

    }
}
