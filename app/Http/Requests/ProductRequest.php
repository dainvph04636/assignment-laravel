<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required|string|min:3',
            'category_id' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Yêu cầu nhập tên sản phẩm',
            'name.min' => 'Tên sản phẩm tối thiểu phải 3 ký tự',
            'category_id.required' => 'Hãy chọn một danh mục sản phẩm',
        ];
    }
}
