<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{


    public function rules()
    {
        return [
            'category_name'=>'required'
        ];
    }

    public function messages()
    {
        return [
          'required' => 'Поле обязательно для заполнения',
        ];
    }

    public function attributes()
    {
        return [
            'category_name'=>'Имя категории'
        ];
    }
}
