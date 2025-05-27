<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardsFormRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string',
            'details' => 'nullable|string',
            'contact_info' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'avatar_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'background_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom est obligatoire.',
            'name.max' => 'Le nom ne peut pas dépasser 255 caractères.',
            'title.max' => 'Le titre ne peut pas dépasser 255 caractères.',
            'subtitle.max' => 'Le sous-titre ne peut pas dépasser 255 caractères.',
            'description.required' => 'La description est obligatoire.',
            'avatar_url.image' => 'L\'avatar doit être une image.',
            'avatar_url.mimes' => 'L\'avatar doit être au format jpeg, png, jpg ou gif.',
            'avatar_url.max' => 'L\'avatar ne peut pas dépasser 2MB.',
            'background_url.image' => 'L\'image de fond doit être une image.',
            'background_url.mimes' => 'L\'image de fond doit être au format jpeg, png, jpg ou gif.',
            'background_url.max' => 'L\'image de fond ne peut pas dépasser 2MB.',
            'sort_order.integer' => 'L\'ordre de tri doit être un nombre entier.',
            'sort_order.min' => 'L\'ordre de tri doit être positif.',
        ];
    }
}