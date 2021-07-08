<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfile1Request extends FormRequest
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
            'phone'=>'required|regex:/(0)[0-9]{9}/',
        ];
    }
    public function messages()
    {
        return[
            'name.required' => 'This field can\'t be empty',
            'phone.required'=>'This field can\'t be empty',
            'phone.regex'=>'Wrong phone format',
        ];
    }
}
