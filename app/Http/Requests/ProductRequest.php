<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nama_product'=>'required|string|max:100',
            'varian'=>'required|string|max:20',
            'harga_pokok'=>'required',
            'harga_jual'=>'required',
            'status'=>'required',
            'stock'=>'required|numeric',
            'foto'=>'mimes:jpeg,png,jpg,gif|max:1024',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_product.required'=>"Nama Product Harus Diisi !",
            'nama_product.string'=>"Nama Product Harus Berupa Karakter !",
            'nama_product.max'=>"Nama Product Maximal 100 Karakter !",
            'varian.required' =>"Varian Harus Diisi !",
            'varian.string' =>"Varian Harus Berupa Karakter !",
            'varian.max' =>"Varian Maximal 20 Karakter !",
            'harga_pokok.required'=>"Harga Pokok Harus Diisi !",
            'harga_jual.required'=>"Harga Jual Harus Diisi !",
            'status.required'=>"Status Harus Diisi !",
            'stock.required'=>"Stock Harus Diisi !",
            'stock.numeric'=>"Stock Harus Berupa Angka !",
            'foto.mimes'=>"Foto Harus jpeg,png,jpg,gif !",
            'foto.max'=>"Foto Harus Berukuran Maximal 1MB !",
        ];
    }
}
