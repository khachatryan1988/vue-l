<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        if (!$user) {
            return response()->json([
                'error' => 'Something went wrong when registering user'
            ], 400);
        }

        return response()->json([]);
    }
}
