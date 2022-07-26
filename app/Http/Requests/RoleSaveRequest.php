<?php

namespace App\Http\Requests;

use Digitalion\LaravelBaseProject\Requests\BaseRequest;

class RoleSaveRequest extends BaseRequest
{
	public function rules()
	{
		return [
			'name' => 'required',
		];
	}
}
