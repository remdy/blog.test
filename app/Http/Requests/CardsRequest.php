<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardsRequest extends FormRequest
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
            'content' => 'required',
            'image' => 'nullable|image',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите название карточки',
            'content.required' => 'Зполните содержание',
            'image.image' => 'Неверный формат изображения',
            'description.required' => 'Заполните краткое описание'
        ];
    }
}
