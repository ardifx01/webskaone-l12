<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class PhotoSlideRequest extends FormRequest
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
    public function rules()
    {
        return [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'overlay' => 'required|string|max:255',
            'order' => 'required|integer|min:1',
            'active' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus berupa jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',

            'title.required' => 'Title harus diisi.',
            'overlay.required' => 'overlay harus diisi.',

            'order.required' => 'order waktu harus diisi.',
            'order.integer' => 'order harus berupa angka.',
            'order.min' => 'order minimum adalah 1000 milidetik.',

            'active.required' => 'Status aktif harus diisi.',
            'active.boolean' => 'Status aktif harus berupa nilai benar atau salah.',
        ];
    }
}
