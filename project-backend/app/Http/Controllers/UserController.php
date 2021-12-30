<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function update(UpdateUserRequest $request)
    {
        $user = Auth::guard('api')->user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        if (!$user->save()) {
            return response()->json(['error' => 'User saving error']);
        }

        return response()->json($user);
    }

    public function getAllUsers()
    {
        $users = User::query()->where('is_admin', false)->where('id', '!=', Auth::guard('api')->user()->id)->get();

        return response()->json($users);
    }

    public function friends()
    {
        $user = Auth::guard('api')->user();

        return response()->json($user->friends()->get());
    }
}
