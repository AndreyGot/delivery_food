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
            // 'password' => 'required|string',
            // 'first_name' => 'required|string',
            // 'second_name' => 'required|string',
            // 'phone_1' => 'required',
        ];
    }

    public function messages()
    {
        $stringMessage = 'Введите текстовое значение!';

        return [
                // 'first_name.required' => 'Поле должно быть заполненным!',
                // 'first_name.string' => $stringMessage,
                // 'second_name.required' => 'Поле должно быть заполненным!',
                // 'second_name.string' => $stringMessage,
                // 'phone_1.required' => 'Поле "телефон" должно быть заполненным!',

        ];
    }


}
