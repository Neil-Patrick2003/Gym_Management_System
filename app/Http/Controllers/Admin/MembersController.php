<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


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


    public function edit(string $id)
    {

    }
}
