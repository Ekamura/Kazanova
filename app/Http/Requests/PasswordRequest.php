<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'password' => ['required', 'current_password:web']
        ];
    }

    public function messages()
    {
        return [
            'required' => '<:attribute> - обязателен для заполнения',
            'password' => 'пароль неправильный'
        ];
    }

    public function attributes()
    {
        return [
            'password' => 'Пароль'
        ];
    }
}
