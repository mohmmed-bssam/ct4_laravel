<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreativeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'start_study' => 'nullable|date|required_with:end_study',
            'final_study' => 'nullable|date|required_with:start_study|after:start_study',
            'image'=>'image|mimes:jpeg,png,jpg',

        ];
    }
}
