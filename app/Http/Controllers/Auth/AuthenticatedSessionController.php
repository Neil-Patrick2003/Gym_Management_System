<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Ensure that the user is available
        $user = $request->user();

        // If no user is logged in, redirect them to the login page
        if (!$user) {
            return redirect()->route('login');
        }

        // Check the role of the authenticated user
        $role = $user->role;

        // Redirect based on the user's role
        if ($role === 'Admin') {
            return redirect()->intended(route('dashboard'));
        } elseif ($role === 'Trainer') {
            return redirect()->intended(route('trainer_dashboard'));
        }

        // Default redirect for other roles (assuming "Member" role here)
        return redirect()->intended(route('member_dashboard'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
