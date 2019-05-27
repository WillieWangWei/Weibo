<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function create() {
        return view('users.create');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users|max:50',
            'password' => 'required|confirmed|min:6|max:20'
        ]);

        if (isset($request->name) &&
            isset($request->email) &&
            isset($request->password)) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            Auth::login($user);
            session()->flash('success', '注册成功');
            return redirect()->route('users.show', [$user]);
        }

        return '参数不完整';
    }
}
