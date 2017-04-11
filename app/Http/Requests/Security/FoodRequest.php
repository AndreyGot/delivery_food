<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
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
            'name' => 'bail|required|string',
            'description' => 'nullable|string',
            'image_field' => 'nullable|image',
            'price' => 'required',
            'bonus'=> 'required|integer|min:0',
            'rating' => 'required|integer|min:0',
            'category_id' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        $stringMessage = 'Введите текстовое значение!';
        $minMessage = 'Введите значение больше или равное :min!';
        $integerMessage = 'Введите числовое значение!';

        return [
            'name.required' => 'Поле "название блюда" не должно быть пустым!',
            'name.string' => $stringMessage,
            'description.string' => $stringMessage,
            'image_field.image' => 'Для поля "изображение", вы должны использовать только файлы формата jpeg, 
                    png, bmp, gif или svg!',
            'price.required' => $stringMessage,
            'bonus.required' => $stringMessage,
            'bonus.integer' => $integerMessage,
            'bonus.min' => $minMessage,
            'rating.required' => 'Поле "рейтинг" не должно быть пустым!',
            'rating.integer' => $integerMessage,
            'rating.min' => $minMessage,
        ];
    }
}
