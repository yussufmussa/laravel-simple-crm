<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'starting_date' => 'required',
            'deadline' => 'required|date',
            'user_id' => 'required|array',
            'client_id' => 'required|exists:clients,id',
            'status' => 'required',
            'fixed_rate' => 'nullable',
            'hourly_rate' => 'nullable',
        ];

        
    }

    public function messages(): array
        {
            return [
                'client_id' => 'Select Member to assign'
            ];

        }
}
