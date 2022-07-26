<?php

namespace App\Http\Requests;

use App\Enums\PermissionEnum;
use Digitalion\LaravelBaseProject\Requests\BaseRequest;

class UserDeleteRequest extends BaseRequest
{
	public function authorize()
	{
		return auth()->user()->can(PermissionEnum::PanelAdmin);
	}
}
