<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoFormRequest extends FormRequest
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
            'adresse' => $isRequired.'string',
			'codepostal' => $isRequired.'string',
			'ville' => $isRequired.'string',
			'pays' => $isRequired.'string',
			'telephone' => $isRequired.'string',
			'email' => $isRequired.'email',
			'lundi' => $isRequired.'string',
			'mardi' => $isRequired.'string',
			'mercredi' => $isRequired.'string',
			'jeudi' => $isRequired.'string',
			'vendredi' => $isRequired.'string',
			'samedi' => $isRequired.'string',
			'dimanche' => $isRequired.'string'
			
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            
        ]);
    }
}