<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            'password' => 'required|min:4|confirmed'
        ];
    }

    public function messages()
    {
        return[
            'password.required'=>'This field can\'t be empty',
            'password.min'=>'Password is too short',
            'password.confirmed'=>'Retype password is not match',
        ];
    }
}
