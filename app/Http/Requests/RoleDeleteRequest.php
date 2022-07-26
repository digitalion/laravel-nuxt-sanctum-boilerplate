<?php

namespace App\Http\Requests;

use App\Enums\PermissionEnum;
use Digitalion\LaravelBaseProject\Requests\BaseRequest;

class RoleDeleteRequest extends BaseRequest
{
	public function authorize()
	{
		return auth()->user()->can(PermissionEnum::PanelAdmin);
	}
}
