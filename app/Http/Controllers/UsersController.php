<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Show the user profile.
     *
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }

    /**
     * Store a new user.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|unique:users|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // Log the user in
        auth()->login($user);

        // Redirect to the user's profile with a session flash message.
        return redirect()->route('users.show', $user)->with('success', 'User created successfully.');
    }

    /**
     * Show the edit user form.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the user.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:50',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update the user
        // $request->filled() checks if the field is present and not empty
        // $request->only() retrieves only the specified fields from the request
        $data = $request->only('name');
        if ($request->filled('password')) {
            $data = $request->only('name','password');
        }
        $user->update($data);

        // Redirect to the user's profile with a session flash message.
        return redirect()->route('users.show', $user)->with('success', 'User updated successfully.');
    }
}
