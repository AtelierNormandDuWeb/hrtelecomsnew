<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HerosliderFormRequest extends FormRequest
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
            'imageUrl' => $isRequired.'image|mimes:webp,jpeg,png,jpg,gif|max:2048',
			'title' => $isRequired.'string',
			'description' => $isRequired.'string',
			'button' => $isRequired.'string'
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}