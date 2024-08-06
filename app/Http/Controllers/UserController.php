<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $userCount = $users->count(); // Counter of how many ppl are registered
        return view('users.index', compact('users', 'userCount'));
    }

    public function show(User $user)
    {
        // Show user profile, if needed
        return view('users.show', compact('user'));
    }

    public function showImage(User $user)
    {
        $imageBinary = $user->profile_image;

        return response($imageBinary, 200)
            ->header('Content-Type', 'image/jpeg');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
