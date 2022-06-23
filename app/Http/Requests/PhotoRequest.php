<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
{
    public function rules()
    {
        return [
            'image'=>'image',
            'product_id'=>'required|string'
        ];
    }
    public function messages(): array
    {
        return [
            'required'=>'поле <:attribute> обязательно для заполнения',
        ];
    }

    public function attributes()
    {
        return [
            'product_id'=>'Товар'
        ];
    }
}
