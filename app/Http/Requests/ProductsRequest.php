<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'image' => 'nullable|image',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите название продукта',
            'image.image' => 'Неверный формат изображения',
            'description.required' => 'Введите описание продукта'
        ];
    }
}

