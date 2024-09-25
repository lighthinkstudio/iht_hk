<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdukRequest extends FormRequest
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
            'sku'       => 'required|unique:produk',
            'nama'      => 'required|max:255|unique:produk',
            'harga'     => 'required|numeric',
            'status'    => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sku.required'      => ':attribute tidak boleh kosong',
            'sku.unique'        => ':attribute sudah digunakan, silahkan ganti dengan yang lain',
            'nama.required'     => ':attribute tidak boleh kosong',
            'nama.unique'       => ':attribute sudah digunakan, silahkan ganti dengan yang lain',
            'harga.required'    => ':attribute tidak boleh kosong',
            'status.required'   => ':attribute harus di pilih',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'sku'       => 'SKU Produk',
            'nama'      => 'Nama Produk',
            'harga'     => 'Harga',
            'status'    => 'Status',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        if($validator->fails())
        {
            return redirect()->route('admin.produk')
                        ->withInput()
                        ->with(['warning' => 'Silahkan periksa form input, data gagal di simpan.']);
        }
    }
}
