<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(Request $request)
    {
        $userDetails = User::select('id', 'name', 'email')->where('id', $request->id)->first();
        return view('edit', ['userDetails' => $userDetails]);
    }

    public function update(UpdateUserRequest $request)
    {
        $isUpdated = User::where('id', $request->id)->update(['name' => $request->name, 'email' => $request->email]);
        if ($isUpdated) {
            return redirect()->back()->with('success_msg', trans('messages.user_updated'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }

    }

    public function delete(Request $request)
    {
        $isDeleted = User::where('id', $request->id)->delete();
        if ($isDeleted) {
            return redirect()->back()->with('success_msg', trans('messages.user_deleted'));
        } else {
            return redirect()->back()->with('error_msg', trans('messages.error_msg'));
        }
    }
}
