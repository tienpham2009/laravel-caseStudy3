<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'origin' => 'required|string',
            'input_date' => 'required|date_format:Y-m-d',
            'expiry_date' => 'required|numeric',
            'amount' => 'required|numeric',
            'unit_price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Không được để trống',
            'unit.required' => 'Không được để trống',
            'origin.string' => 'Xuất xứ phải là chữ',
            'origin.required' => 'Không được để trống',
            'amount.numeric' => 'Số lượng phải là số',
            'amount.required' => 'Không được để trống',
            'unit_price.required' => 'Không được để trống',
            'unit_price.numeric' => 'Đơn giá phải là số',
            'input_date.required' => 'Không được để trống',
            'input_date.date_format' => 'Không đúng dịnh dạng',
            'expiration_date.required' => 'Không được để trống',
            'expiry_date.required' => 'Không được để trống',
            'expiry_date.numeric'=>'Hạn sử dụng phải là số',

        ];
    }
}
