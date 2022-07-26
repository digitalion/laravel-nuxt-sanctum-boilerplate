<?php

namespace App\Http\Requests;

use Digitalion\LaravelBaseProject\Requests\BaseRequest;

class AuthRequest extends BaseRequest
{
	public function rules()
	{
		return [
			'email' => 'required|email',
			'password' => 'required',
		];
	}
}
