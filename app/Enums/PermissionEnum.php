<?php

namespace App\Enums;

use Digitalion\LaravelMakes\Traits\EnumSerializableTrait;

final class PermissionEnum
{
	use EnumSerializableTrait;

	const PanelAdmin = 'panel-admin';
}
