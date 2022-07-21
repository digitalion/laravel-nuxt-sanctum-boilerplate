<?php

namespace App\Http\Requests;

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
