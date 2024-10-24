<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Show the form for editing the user profile.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function edit()
    {
        $user = Auth::user();
        return view('front.dashboard.profile', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:8',
        ]);

        // Update name and email
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // Check if password fields are filled, and if so, update the password
        if ($request->filled('password') && $request->filled('password_confirmation')) {
            if ($request->password === $request->password_confirmation) {
                $user->password = Hash::make($request->password);
            }
        }

        // Save the updated user data
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

}
