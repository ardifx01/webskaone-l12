<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class RiwayatAplikasiRequest extends FormRequest
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
            'judul' => [
                'required',
                'string',
            ],
            'sub_judul' => [
                'required',
                'nullable',
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul harus diisi.',
            'sub_judul.nullable' => 'Sub Judul harus diisi.',
            'deskripsi.nullable' => 'Deskripsi harus diisi.',
        ];
    }
}
