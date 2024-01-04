<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePerpustakaanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'judul' => [
                'required',
                // 'sometimes',
                'max:100',
                Rule::unique('Perpustakaans')->ignore($this->id),
            ],
            'penulis' => 'sometimes|required|max:100',
            'gambar' => 'sometimes|image|mimes:png,jpg,jpeg',
            'price' => 'sometimes|required|numeric|min:1',
            'jumlah' => 'sometimes|required|numeric|min:0',
        ];

    }
}