<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:32',
            'birthday' => 'required',
            'is_active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {

        return [
            'first_name.required' => 'Yêu cầu nhập tên đầy đủ',
            'first_name.string' => 'Tên phải la 1 chuoi ký tự',
            'first_name.min' => 'Tên toi thieu phải 2 ký tự',

            'last_name.required' => 'Yêu cầu nhập tên đầy đủ',
            'last_name.string' => 'Tên phải la 1 chuoi ký tự',
            'last_name.min' => 'Tên toi thieu phải 2 ký tự',

            'email.required' => 'Yêu cầu nhập email',
            'email.email' => 'Nhập đúng định dạng email',
            'email.unique' => 'Email đã được sử dụng',

            'password.required' => 'Yêu cầu nhập mat khau',
            'password.min' => 'Mật khẩu tối thiểu phải 6 ký tự',
            'password.max' => 'Mật khẩu tối đa chỉ được 32 ký tự',

            'birthday.required' => 'Yêu cầu nhập ngày sinh',

        ];

    }
}
