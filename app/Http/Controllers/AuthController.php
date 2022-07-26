<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
	public function login(AuthRequest $request)
	{
		$user = User::where('email', request('email'))->first();
		if (!$user || !Hash::check(request('password'), $user->password)) {
			return response()->error(trans('auth.failed'), 401);
		}
		$user->tokens()->delete();
		$roles = $user->roles->pluck('name')->all();
		$token = $user->createToken('token', $roles)->plainTextToken;

		return response()->success(compact('token'), 200, trans('auth.logged', ['name' => $user->name]));
	}

	public function profile()
	{
		return response()->success(auth()->user());
	}

	public function logout(Request $request)
	{
		auth()->user()->tokens()->delete();

		return response()->success(trans('auth.logged_out'));
	}
}
