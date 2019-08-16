<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateLoginRequest extends FormRequest
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
            'email' => 'required|email|exists:users',
			'password' => 'required|min:6|max:32',
        ];
    }
    public function messages()
    {
        return [

            'email.required' => 'Yêu cầu nhập Email',
            'email.email' => 'Sai định dạng Email',

            'password.required' => 'Yêu cầu nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu phải 6 ký tự',
            'password.max' => 'Mật khẩu tối đa chỉ 32 ký tự',

        ];

    }
}
