<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($user->profile_photo && Storage::exists('public/' . $user->profile_photo)) {
            // If the user has an old photo, delete it
            Storage::delete('public/' . $user->profile_photo);
        }

        if ($request->hasFile('profile_photo')) {
            $photo = $request->file('profile_photo');
            $image_name = time() . '_' . $photo->getClientOriginalName();
            $path = $photo->storeAs('images/profile_photo', $image_name, 'public');
        }
        $user->photo_url = $path;
        if ($user instanceof \App\Models\User) {
            // This confirms $user is an instance of the User model
            $user->save();
        }

        return back()->with('success', 'Profile photo updated successfully!');
    }

}
