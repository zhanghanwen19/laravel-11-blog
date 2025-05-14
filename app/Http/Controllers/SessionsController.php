<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    /**
     * Show the login form.
     *
     * @return View
     */
    public function create(): View
    {
        return view('sessions.create');
    }

    /**
     * Log the user in.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials, $request->has('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('users.show', auth()->user())->with('success', 'Logged in successfully.');
        }

        return back()->withInput()->with('danger', 'Invalid credentials.');
    }

    /**
     * Log the user out.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->session()->invalidate();
        return redirect('login')->with('success', 'Logged out successfully.');
    }
}
