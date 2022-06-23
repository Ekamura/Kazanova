<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name_product' => 'required|min:3',
            'price_product' => 'required',
            'count' => 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => '":attribute" обязательно для заполнения',
            'exists' => 'Поле ":attribute" должно быть существующим',
        ];
    }

    public function attributes()
    {
        return [
            'name_product'=>'Название',
            'category_id'=>'Категория',
            'price_product' => 'Цена',
            'count' => 'Количество',
        ];
    }
}
