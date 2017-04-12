<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantContactsRequest extends FormRequest
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
            'email' => 'email',
            'phone_1' => 'required|string',
            'phone_2' => 'string',
            'description' => 'string',
            'restaurant_id' => 'required|integer',
        ];
    }

    public function messages()
    {
        $stringMessage = 'Введите текстовое значение!';

        return [
            'email.email' => 'Введите коректный email!',
            'phone_1.required' => 'Поле "телефон 1" не может быть пустым!',
            'phone_1.string' => $stringMessage,
            'phone_2.string' => $stringMessage,
            'description.string' => $stringMessage,
        ];
    }


}
