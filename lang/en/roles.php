<?php

use App\Enums\RoleEnum;

return [
	'values' => [
		RoleEnum::Admin => 'Administrator',
		RoleEnum::User => 'User',
	],
	'messages' => [
		'create_success' => 'Role successfully created',
		'create_already_exists' => 'Role already exists',
		'update_success' => 'Role successfully updated',
		'delete_success' => 'Role successfully deleted',
	],
];
