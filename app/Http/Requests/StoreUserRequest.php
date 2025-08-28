<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class StoreUserRequest extends FormRequest
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
            'profile_picture' => 'required|image|max:50000|mimes:png,jpeg',
            'bio' => 'max:500|nullable',
            'github_repo_url' => 'url|nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => "required|email|unique:users,email",
            'username' => "required|min:5|max:20|unique:users,username",
            'password' => 'required|string|min:8',
            'date_of_birth' => 'date|nullable',
            'gender' => 'integer|nullable',
            'phone_number' => 'max:20|nullable',
            'country' => 'required',
            'city' => 'required_with:country',
            'street' => 'string|nullable',
            'state' => 'string|nullable',
            'website' => 'url|nullable',
            'zip_code' => 'string|nullable',
            'x_url' => 'url|nullable',
            'instagram_url' => 'url|nullable'
        ];
    }
}
