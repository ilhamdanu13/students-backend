<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'txtid' => 'required|unique:students,idstudents|min:3|max:3',
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => 'required|email|unique:students,email',
            'txtphone' => 'required|numeric',
            'txtaddress' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'txtid.required' => ':attribute tidak boleh kosong',
            'txtid.unique' => ':attribute sudah digunakan',
            'fullname.required' => ':attribute tidak boleh kosong',
            // 'txtgender.required' => ':attribute tidak boleh kosong',
            // 'txtemail.required' => ':attribute idak boleh kosong',
            // 'txtphone.required' => ':attribute tidak boleh kosong',
            // 'txtaddress.required' => ':attribute tidak boleh kosong'
        ];
    }

    public function attributes(): array
    {
        return [
            'txtid' => 'ID Students',
            'txtfullname' => 'Nama Lengkap',
            // 'txtgender' => 'Gender',
            // 'txtemail' => 'Email',
            // 'txtphone' => 'Phone',
            // 'txtaddress' => 'Address'
        ];
    }
}
