<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(): View
    {
        return view('users.create');
    }

    public function show(User $user): View
    {
        return view('users.show', compact('user'));
    }
}
