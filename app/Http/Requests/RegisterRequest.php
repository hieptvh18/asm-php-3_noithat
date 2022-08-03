<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required|min:6|max:30',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6|max:30',
        ];
    }

    // 
    public function messages()
    {
        return [
            'name.required'=>'Tên không được trống',
            'name.min'=>'Tên không được nhỏ hơn :min kí tự',
            'name.max'=>'Tên không được lớn hơn :max kí tự',
            'email.required'=>'Email không được để trống',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã tồn tại!',
            'password.required'=>'Password không được để trống!',
            'password.min'=>'Password không được nhỏ hơn :min kí tự!',
            'password.max'=>'Password không được lớn hơn :max kí tự!',
        ];
    }
}
