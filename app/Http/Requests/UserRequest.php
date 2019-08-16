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
            'email' => 'required|email',
            'password' => 'required|min:6|max:32',
            'birthday' => 'required',
            'is_active' => 'nullable|numeric',
        ];
    }

    public function messages()
    {

        return [
            'first_name.required' => 'Yeu cau nhap ten day du',
            'first_name.string' => 'Ten phai la 1 chuoi ky tu',
            'first_name.min' => 'Ten toi thieu phai 2 ky tu',

            'last_name.required' => 'Yeu cau nhap ten day du',
            'last_name.string' => 'Ten phai la 1 chuoi ky tu',
            'last_name.min' => 'Ten toi thieu phai 2 ky tu',

            'email.required' => 'Yeu cau nhap email',
            'email.email' => 'Nhap dung dinh dang email',

            'password.required' => 'Yeu cau nhap mat khau',
            'password.min' => 'Mật khẩu tối thiểu phải 6 ký tự',
            'password.max' => 'Mật khẩu tối đa chỉ được 32 ký tự',
        ];

    }
}
