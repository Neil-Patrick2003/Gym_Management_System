<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class AdminController extends Controller
{
    public function index(){
        //fetch
        $user = Auth::user();

        return view('admin/index', [
            'user' => $user
        ]);
    }
}
