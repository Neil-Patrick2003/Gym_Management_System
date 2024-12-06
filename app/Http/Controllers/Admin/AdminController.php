<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch the logged-in user
        $user = Auth::user();

        // Fetch role counts
        $roles = DB::table('users')
            ->select('role', DB::raw('COUNT(*) as count'))
            ->groupBy('role')
            ->get();

        // Prepare role counts for easy access
        $roleCounts = [];
        foreach ($roles as $role) {
            $roleCounts[strtolower($role->role)] = $role->count;
        }

        // Fetch programs
        $programs = DB::table('programs')
            ->select('name', DB::raw('COUNT(*) as count'))
            ->groupBy('name')
            ->get();

        return view('admin.index', [
            'user' => $user,
            'roles' => $roles,
            'programs' => $programs,
            'roleCounts' => $roleCounts // Pass the role counts
        ]);
    }
}
