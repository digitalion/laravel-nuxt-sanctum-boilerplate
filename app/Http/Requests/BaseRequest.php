<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [];
    }

    public function fields(): array
    {
        $validation = $this->rules();
        return array_keys($validation);
    }

    public function attributes()
    {
        return trans('fields');
    }
}
