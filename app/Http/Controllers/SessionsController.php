<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $credentials = $this->validate($request, [
            'email' => 'required|email|max:50',
            'password' => 'required|min:6|max:20'
        ]);

        if (Auth::attempt($credentials)) {
            session()->flash('success', '登录成功');
            return Redirect::route('users.show', [Auth::user()]);
        } else {
            session()->flash('danger', '邮箱或密码错误');
            return Redirect::back()->withInput();
        }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', '退出成功');
        return Redirect::route('login');
    }
}
