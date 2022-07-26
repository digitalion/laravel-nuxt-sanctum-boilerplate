<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleDeleteRequest;
use App\Http\Requests\RoleSaveRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
	public function index()
	{
		$roles = Role::all();
		return response()->success($roles);
	}

	public function store(RoleSaveRequest $request)
	{
		$role = Role::firstOrCreate(['name' => $request('name')]);

		if ($role->wasRecentlyCreated) {
			return response()->success($role, trans('roles.messages.create_success'));
		} else {
			return response()->error(trans('roles.messages.create_already_exists'), 409);
		}
	}

	public function show(Role $role)
	{
		return response()->success($role);
	}

	public function update(RoleSaveRequest $request, Role $role)
	{
		$role->update($request->validated());

		return response()->success($role, trans('roles.messages.update_success'));
	}

	public function destroy(RoleDeleteRequest $request, Role $role)
	{
		$role->delete();

		return response()->success(trans('roles.messages.delete_success'));
	}
}
