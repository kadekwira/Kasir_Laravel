<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>"Nama Harus Diisi !",
            'email.required'=>"Email Harus Diisi !",
            'email.email'=>"Email Harus Valid !",
            'email.unique'=>"Email Sudah Terdaftar !",
            'password.required'=>"Password Harus Diisi! ",
            'password.string'=>"Password Harus Berupa karakter ! ",
            'password.min'=>"Password Harus Diisi minimal 6 karakter! ",
            'password.regex'=>"Password Harus Diisi dengan benar! ",

        ];
    }
}
