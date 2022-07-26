<?php

namespace App\Http\Requests;

use Digitalion\LaravelBaseProject\Requests\BaseRequest;

class UserSaveRequest extends BaseRequest
{
	public function rules()
	{
		return [
			'firstname' => 'required|string',
			'lastname' => 'nullable|string',
			'email' => 'required|email',
			'password' => 'required',
			'role_id' => 'required|exists:roles,id',
		];
	}
}
