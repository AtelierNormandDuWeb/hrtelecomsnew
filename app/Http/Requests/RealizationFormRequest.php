<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RealizationFormRequest extends FormRequest
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
        $isRequired = request()->isMethod("POST") ?"required|": "";
        return [
            //
            'name' => $isRequired.'string',
			'slug' => $isRequired.'',
			'description' => $isRequired.'string',
			'moreDescription' => $isRequired.'string',
			'additionalInfos' => $isRequired.'string',
			'imageUrls' => $isRequired.'array|max:5',
			'imageUrls.*' => 'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'categories' => $isRequired.'array|exists:categories,id'
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => \Illuminate\Support\Str::slug($this->input('name')),
			
        ]);
    }
}