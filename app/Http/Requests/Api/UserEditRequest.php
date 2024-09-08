<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends UserStoreRequest
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
        $rules = parent::rules();
        $rules['name'] = [
            'nullable',
            'unique:users',
            'min:6',
            'max:20'
        ];
        $rules['email'] = [
            'nullable',
            'email',
            'unique:users'
        ];
        $rules['password'] = [
            'nullable',
            'min:6',
            'max:20'
        ];

        return $rules;
    }
}
