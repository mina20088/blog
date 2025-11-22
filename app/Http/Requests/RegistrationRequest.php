<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class RegistrationRequest extends FormRequest
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
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'username' => 'required|min:3|max:15|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', Password::min(8)->max(15)->letters()->numbers()->symbols()],
            'confirmPassword' => 'required|same:password'
        ];
    }

}
