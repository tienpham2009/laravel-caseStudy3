<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'phone'=>'required|regex:/(0)[0-9]{9}/',
            'province'=>'required',
            'district'=>'required',
            'ward'=>'required',
            'password' => 'required|min:4|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'This field can\'t be empty',
            'email.required' => 'This field can\'t be empty',
            'phone.required'=>'This field can\'t be empty',
            'phone.regex'=>'Wrong phone format',
            'province.required' => 'This field can\'t be empty',
            'district.required' => 'This field can\'t be empty',
            'ward.required' => 'This field can\'t be empty',
            'email.email' => 'Wrong email format',
            'email.unique' => 'Email is existed',
            'password.required'=>'This field can\'t be empty',
            'password.min'=>'Password is too short',
            'password.confirmed'=>'Retype password is not match',
        ];
    }
}
