<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content'],
        ]);

        session()->flash('success', '发布成功');

        return Redirect::back();
    }

    public function destroy (Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', '微博已被成功删除');
        return Redirect::back();
    }
}
