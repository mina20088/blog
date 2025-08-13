<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use function PHPUnit\Framework\isNull;

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
            'search' => '',
            'searchBy' => 'array',
            'sortBy' => 'sometimes',
        ];
    }

    public function after(): array
    {
            return [
                function(Validator $validator){
                    if ($this->input('search') !== null  && empty($this->input('searchBy')))
                    {
                        $validator->errors()->add('search', 'please choose a filter for searching');
                    }
                },
            ];

    }

}


