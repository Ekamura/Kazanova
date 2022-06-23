<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class RegisterRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name_user' => 'required',
            'email' => 'required|email|unique:users,email',
            //'phone' => 'regex: /^[\d\+][\d\(\)\ -]{4,14}\d$/',
            'password' => [
                'required',
                'min:6',
                'confirmed'
            ],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'поле <:attribute> обязательно для заполнения',
            'email' => 'электронный адрес должен быть валидным',
            'min' => '<:attribute> должен содержать минимум 6 символов',
            'unique' => 'Пользователь с такими данными <:attribute> уже зарегистрирован',
            'password.confirmed' => 'Пароли должны совпадать'
        ];
    }

    public function attributes()
    {
        return [
            'name_user' => 'Имя',
            'email' => "Электронная почта",
            'phone' => 'Номер телефона',
            'password' => 'Пароль',
        ];
    }


}
