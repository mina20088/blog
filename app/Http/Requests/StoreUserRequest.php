<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
            'profile_image' => 'required|image|max:50000|mimes:png,jpeg',
            'bio' => 'max:500|nullable',
            'git_hub_link' => 'url|nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => "required|email|unique:users,email",
            'username' => "required|min:5|max:20|unique:users,username",
            'password' => ['required', Password::default()->letters()->numbers()->mixedCase()->symbols()->uncompromised()],
            'date_of_birth' => 'date|nullable',
            'gender' => 'nullable',
            'phone' => 'max:20|nullable',
            'country' => 'required',
            'city' => 'required_with:country',
            'street' => 'string|nullable',
            'state' => 'string|nullable',
            'website' => 'url|nullable',
            'zipCode' => 'string|nullable',
            'twitter_profile' => 'url|nullable',
            'instagram' => 'url|nullable'
        ];
    }
}
