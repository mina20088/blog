<?php

namespace App\Http\Requests;

use App\Enums\Gender;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
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
            'profile_picture' => 'required|image|max:50000',
            'bio' => 'max:500|nullable',
            'github_repo_url' => 'url|nullable',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => "required|email|unique:users,email",
            'username' => "required|min:5|max:20|unique:users,username",
            'password' => 'required|string|min:8',
            'date_of_birth' => 'date|nullable',
            'gender' => ['integer','nullable'],
            'phone_number' => 'required|max:20',
            'country' => 'required',
            'city' => 'required_with:country',
            'street' => 'string|nullable',
            'state' => 'string|nullable',
            'website' => 'url|nullable',
            'zip_code' => 'string|nullable',
            'x' => 'url|nullable',
            'instagram' => 'url|nullable',
            'facebook' => 'url|nullable'
        ];
    }

    public function userData() :array
    {
         return $this->safe(['first_name', 'last_name', 'email', 'username', 'password']);
    }


    public function profileData() :array
    {
        return $this->safe([
            'date_of_birth',
            'gender',
            'phone_number',
            'street',
            'country',
            'city',
            'state',
            'website',
            'zip_code',
            'x',
            'instagram',
            'facebook',
            'bio',
            'github_repo_url',

        ]);
    }

    public function imageData(): array|UploadedFile|null
    {
        return $this->file('profile_picture');
    }
}
