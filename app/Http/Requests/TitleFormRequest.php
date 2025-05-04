<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TitleFormRequest extends FormRequest
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
            'title1' => $isRequired.'string',
			'title2' => $isRequired.'string',
			'title3' => $isRequired.'string',
			'title4' => $isRequired.'string',
			'title5' => $isRequired.'string',
			'title6' => $isRequired.'string',
			'title7' => $isRequired.'string',
			'title8' => $isRequired.'string',
			'title9' => $isRequired.'string',
			'title10' => $isRequired.'string'
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}