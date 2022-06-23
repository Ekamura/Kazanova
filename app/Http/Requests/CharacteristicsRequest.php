<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;



class CharacteristicsRequest extends FormRequest
{

    public function rules()
    {
        return [
            'value' => 'required|unique:characteristics,value',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Необходимо заполнить значение элемента!',
            'unique' => 'Данный элемент уже имеется в базе',
        ];
    }


    public function failedValidation(Validator $validator)
    {
        throw new ValidationException(
            $validator,
            response()->json($validator->errors(), 422)
        );
    }
}
