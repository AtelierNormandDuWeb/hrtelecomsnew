<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolutionFormRequest extends FormRequest
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
            'button1' => $isRequired.'string',
			'button2' => $isRequired.'string',
			'title' => $isRequired.'string',
			'description' => $isRequired.'string',
			'liste1' => $isRequired.'string',
			'liste2' => $isRequired.'string',
			'liste3' => $isRequired.'string',
			'liste4' => $isRequired.'string',
			'liste5' => $isRequired.'string',
			'imageUrl' => $isRequired.'image|mimes:webp,jpeg,png,jpg,gif|max:2048'
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}