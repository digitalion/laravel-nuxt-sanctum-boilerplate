<?php

namespace App\Enums;

use Digitalion\LaravelMakes\Traits\EnumSerializableTrait;

final class RoleEnum
{
	use EnumSerializableTrait;

	const Admin = 'admin';
	const User = 'user';
}
