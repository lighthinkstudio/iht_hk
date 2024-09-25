<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriRequest extends FormRequest
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
            'nama'      => 'required|max:50|unique:kategori',
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
            'nama.required'         => ':attribute tidak boleh kosong',
            'nama.unique'           => ':attribute sudah digunakan, silahkan ganti dengan yang lain',
            'status.required'       => ':attribute harus di pilih',
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
            'nama'      => 'Nama Kategori',
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
            return redirect()->route('admin.kategori')
                        ->withInput()
                        ->with(['warning' => 'Silahkan periksa form input, data gagal di simpan.']);
        }
    }
}
