<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
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
            'city' => 'required|string',
            'street' => 'required|string',
            'house' => 'required|string',
            // 'phone_1' => 'required',
        ];
    }

    public function messages()
    {
        $stringMessage = 'Введите текстовое значение!';

        return [
                'city.required' => 'Поле должно быть заполненным!',
                'city.string' => $stringMessage,
                'street.required' => 'Поле должно быть заполненным!',
                'street.string' => $stringMessage,
                'house.required' => 'Поле должно быть заполненным!',
                'house.string' => $stringMessage
                // 'phone_1.required' => 'Поле "телефон" должно быть заполненным!',

        ];
    }


}
