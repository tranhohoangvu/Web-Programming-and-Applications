<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class   UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            // 'username' =>'required',
            'email' => 'required|email|unique:users,email',
            // 'password' => 'required|limit',
            'vaitro' => 'required',
            'trangthaikhoa' => 'required',
            'sodienthoai' => 'required',
            'hotendaydu' =>'required'
            
        ];
    }
    public function messages(): array
    {
        return [
            // 'username.required' =>'Username là bắt buộc.',
            'email.required' =>'Bạn chưa nhập vào email.',
            'email.email' => 'Vui lòng nhập đúng định dạng.Ví dụ abc@gmail.com',
            // 'password.required'=>'Bạn chưa nhập mật khẩu.',
            'vaitro.required' =>'Bạn chưa xác định vai trò tài khoản.',
            'trangthaikhoa.required' =>'Bạn chưa định nghĩa trạng thái tài khoản.',
            'sodienthoai.required' => 'Vui lòng nhập số điện thoại.',
            'hotendaydu.required' => 'Vui lòng nhập họ tên đầy đủ',
            'email.unique' => 'Email đã tồn tại.Vui lòng sử dụng một email khác!'

        ];
    }
}
