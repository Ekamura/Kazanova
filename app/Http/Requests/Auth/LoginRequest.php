<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password'=>['required']
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Поле <:attribute> обязательно для заполнения',
            'email' => 'Поле <:attribute> обязательно для заполнения',
            'password'=>'Неправильно заполнен <:attribute>'
        ];
    }

    public function attributes()
    {
        return [
            'email'=>"Почта",
            'password'=>'Пароль'
        ];
    }
}
