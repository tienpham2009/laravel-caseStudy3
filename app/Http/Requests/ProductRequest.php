<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'unit' => 'required',
            'origin' => 'required|regex:/[A-Za-z]/',
            'expiry_date' => 'required|numeric',
            'amount' => 'required|numeric',
            'input_date'=> 'required',
            'unit_price' => 'required|numeric',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'unit.required' => 'Không được để trống',
            'origin.regex' => 'Xuất xứ phải là chữ',
            'origin.required' => 'Không được để trống',
            'amount.numeric' => 'Số lượng phải là số',
            'amount.required' => 'Không được để trống',
            'unit_price.required' => 'Không được để trống',
            'unit_price.numeric' => 'Đơn giá phải là số',
            'image.required' => 'Không được để trống',
            'expiry_date.required' => 'Không được để trống',
            'expiry_date.numeric'=>'Hạn sử dụng phải là số',
            'input_date.required'=>'Không được để trống'
        ];
    }
}
