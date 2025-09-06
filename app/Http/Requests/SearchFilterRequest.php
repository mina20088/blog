<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFilterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'search' => 'required',
            'searchBy' => 'sometimes',
            'sortBy' => 'sometimes',
        ];
    }

    public function messages(): array
    {
        return [
            'search.required' => 'Please enter a search term',
            'searchBy.required_with' => 'Please select a search option'
        ];
    }


}


