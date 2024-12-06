<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Routing\Controller;

class MembersController extends Controller
{

    public function index()
    {
        $all_members = User::member()->count();
        $active_members_count= User::member()->active()->count();
        $inactive_members_count= User::member()->inactive()->count();
        $joined_today_members_count= User::member()->joinedToday()->count();

        $members = User::where('role', '=', 'Member')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.member.index', [
            'members' => $members,
            'all_members' => $all_members,
            'active_members_count' => $active_members_count,
            'inactive_members_count' => $inactive_members_count,
            'joined_today_members_count' =>$joined_today_members_count
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
