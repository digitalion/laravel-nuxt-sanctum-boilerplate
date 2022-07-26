<?php

namespace Database\Seeders;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		Role::truncate();
		Permission::truncate();
		Schema::enableForeignKeyConstraints();

		$guard_name = config('auth.defaults.guard');

		// create roles
		$roles = collect(RoleEnum::values())
			->map(function ($role) use ($guard_name) {
				return [
					'name' => $role,
					'guard_name' => $guard_name,
				];
			})
			->values()
			->all();
		Role::insert($roles);

		// create permissions
		$permissions = collect(PermissionEnum::values())
			->map(function ($permission) use ($guard_name) {
				return [
					'name' => $permission,
					'guard_name' => $guard_name,
				];
			})
			->values();
		Permission::insert($permissions->all());

		// give permission
		$role_admin = Role::where('name', RoleEnum::Admin)->first();
		$permissions = Permission::all();
		$role_admin->syncPermissions($permissions);
	}
}
