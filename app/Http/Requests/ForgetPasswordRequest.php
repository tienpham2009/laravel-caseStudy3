<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgetPasswordRequest extends FormRequest
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
            'email' => 'required|email:rfc,dns|exists:users',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'You have not entered your email',
            'email.email' => 'Wrong email format',
            'email.exists' => 'User not found',
        ];
    }
}
