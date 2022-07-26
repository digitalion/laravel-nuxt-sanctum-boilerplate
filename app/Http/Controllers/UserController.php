<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserSaveRequest;
use App\Models\User;

class UserController extends Controller
{
	public function index()
	{
		$users = User::all();

		return response()->success($users);
	}

	public function store(UserSaveRequest $request)
	{
		$role_id = $request('role_id');
		unset($user_fields['role_id']);

		$user_fields = $request->validated();
		unset($user_fields['email']);
		$user = User::firstOrCreate(
			['email' => $request('email')],
			$user_fields
		);
		if (!$user->wasRecentlyCreated) {
			return response()->error(trans('users.messages.create_already_exists'), 409);
		}

		$role = Role::find($role_id);
		$user->assignRole($role);

		return response()->success($user);
	}

	public function show(User $user)
	{
		return response()->success($user);
	}

	public function update(UserSaveRequest $request, User $user)
	{
		$data = $request->validated();

		$role_id = $data['role_id'];
		$role = Role::find($role_id);
		unset($data['role_id']);

		$user->update($data);
		$user->syncRoles($role);

		return response()->success($user, trans('users.messages.update_success'));
	}

	public function destroy(UserDeleteRequest $request, User $user)
	{
		$admin_role = Role::where('name', RoleEnum::Admin)->first();
		$admin_users = $admin_role->users
			->reject(function ($item) use ($user) {
				return $item->id == $user->id;
			})
			->count();

		if ($admin_users == 0) {
			// The user is the only administrator user. There must be at least one.
			return response()->error(trans('users.messages.delete_no_other_admins'), 409);
		}

		$user->delete();

		return response()->success(trans('users.messages.delete_success'));
	}
}
