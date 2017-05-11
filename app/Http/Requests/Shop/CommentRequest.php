<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 11.05.2017
 * Time: 12:42
 */

namespace App\Http\Requests\Shop;


use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
//            'name' => 'bail|required|string',
//            'description' => 'bail|nullable|string',
//            'image_field' => 'nullable|image',
//            'restaurant_id' => 'required|integer|min:1',
            'comment.content' => 'required',
            'comment.rating' => 'required|between:0,6|'
        ];
    }

    public function messages()
    {
//        $stringMessage = 'Введите текстовое значение!';

        return [
            'comment.content.required' => 'Введите текст отзыва!',
//            'name.required' => 'Поле "название категории" не должно быть пустым!',
//            'name.string' => $stringMessage,
//            'description.string' => $stringMessage,
//            'image_field.image' => 'Для поля "изображение", вы должны использовать только файлы формата jpeg,
//                    png, bmp, gif или svg!'
        ];
    }
}