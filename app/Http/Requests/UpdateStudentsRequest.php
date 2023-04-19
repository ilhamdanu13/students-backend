<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
            'txtfullname' => 'required',
            'txtgender' => 'required',
            'txtemail' => [
                'required',
                Rule::unique('students','email')->ignore($this->txtid,'idstudents'),
            ],
            'txtphone' => 'required|numeric',
            'txtaddress' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
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
            'txtfullname' => 'Nama Lengkap',
            // 'txtgender' => 'Gender',
            // 'txtemail' => 'Email',
            // 'txtphone' => 'Phone',
            // 'txtaddress' => 'Address'
        ];
    }
}
