<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'working_hours' => 'required|string',
            'image_field' => 'nullable|image',
            'description' => 'bail|nullable|string',
            'rating' => 'bail|required|integer|min:0',
        ];
    }

    public function messages()
    {
        $stringMessage = 'Введите текстовое значение!';

        return [
            'name.required' => 'Поле "название ресторана" должно быть заполненным!',
            'name.string' => $stringMessage,
            'working_hours.required' => 'Поле "время работы" должно быть заполненным!',
            'working_hours.string' => $stringMessage,
            'image_field.image' => 'Для поля "изображение", вы должны использовать только файлы формата jpeg, 
                    png, bmp, gif или svg!',
            'description.string' => $stringMessage,
            'rating.required' => 'Поле "рейтинг" должно быть заполненным!',
            'rating.integer' => 'Введите числовое значение!',
            'rating.min' => 'Введите значение больше или равное :min!'
        ];
    }


}
