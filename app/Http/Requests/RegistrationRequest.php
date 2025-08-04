<?php

namespace App\Http\Requests;


use App\Traits\HandleRateLimiting;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;

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
            'firstName' => 'required|min:3',
            'lastName' => 'required',
            'username' => 'required|min:3|max:15|unique:auth,username',
            'email' => 'required|email|unique:auth,email',
            'password' => ['required', Password::defaults() ],
            'confirmPassword' => 'required|same:password'
        ];
    }

}
