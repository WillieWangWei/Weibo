<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);

        if (!Auth::user()->isFollowing($user)) {
            Auth::user()->follow($user->id);
        }

        return Redirect::route('users.show', $user);
    }

    public function destroy(User $user)
    {
        $this->authorize('follow', $user);

        if (Auth::user()->isFollowing($user)) {
            Auth::user()->unfollow($user->id);
        }

        return Redirect::route('users.show', $user);
    }
}
