<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name'                      => 'required|string|max:255',
            'email'                     => 'required|string|email|max:255|unique:users',
            'password'                  => 'required|string|confirmed|min:6',
            'password_confirmation'     => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required'                     => 'Tên không được để trống',
            'name.max'                          => 'Vượt quá ký tự',
            'name.string'                       => 'Tên phải là kiểu chuỗi',
            'email.required'                    => 'Email không được để trống',
            'email.unique'                      => 'Email đã tồn tại trong hệ thống',
            'email.string'                      => 'Email phải là kiểu chuỗi',
            'email.email'                       => 'Email không đúng định dạng',
            'password.required'                 => 'Mật khẩu không được để trống',
            'password.min'                      => 'Mật khẩu không được ít hơn 6 ký tự',
            'password.string'                   => 'Mật khẩu là kiểu chuỗi',
            'password.confirmed'                => 'Mật khẩu không khớp',
            'password_confirmation.required'    => 'Mật khẩu xác thực không được để trống',
            'password_confirmation.min'         => 'Mật khẩu xác thực không được ít hơn 6 ký tự',
        ];
    }
}
