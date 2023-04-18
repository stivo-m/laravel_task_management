<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email_address' => 'required|string|email|unique:users,email_address',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(4)->mixedCase()->symbols(),
            ]
        ];
    }
}
