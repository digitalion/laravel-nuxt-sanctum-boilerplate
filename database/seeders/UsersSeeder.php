<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class UsersSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Schema::disableForeignKeyConstraints();
		User::truncate();
		Schema::enableForeignKeyConstraints();

		$admin = User::create([
			'email' => 'admin@digitalion',
			'password' => 'digitalion',
			'firstname' => 'Test',
			'lastname' => 'Admin',
		]);
		$role = Role::where('name', RoleEnum::Admin)->first();
		$admin->assignRole($role);

		$user = User::create([
			'email' => 'user@digitalion',
			'password' => 'digitalion',
			'firstname' => 'Test',
			'lastname' => 'User',
		]);
		$role = Role::where('name', RoleEnum::User)->first();
		$user->assignRole($role);
	}
}
