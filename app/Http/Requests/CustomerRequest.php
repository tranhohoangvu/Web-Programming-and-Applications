<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'TenKhachHang' =>'required',
            'soDienThoai' => ['required', 'regex:/^[0-9]{10}$/'],
            'ngaysinh' => 'required',
            'diaChi' => 'required',

            
        ];
    }
    public function messages(): array
    {
        return [
            'TenKhachHang.required' =>'Tên khách hàng là bắt buộc.',
            'soDienThoai.required' =>'Bạn chưa nhập vào Số điện thoại.',
            'soDienThoai.regex' => 'Số điện thoại phải có đúng 10 chữ số.',
            'ngaysinh.required' => 'Bạn chưa nhập vào ngày sinh.',
            'diaChi.required'=>'Bạn chưa nhập địa chỉ.'
        ];
    }
}
