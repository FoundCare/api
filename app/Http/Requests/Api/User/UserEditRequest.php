<?php

namespace App\Http\Requests\Api\User;

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
            'string',
            'min:6',
            'max:20'
        ];
        $rules['email'] = [
            'nullable',
            'email',
        ];
        $rules['cpf'] = [
            'nullable',
            'string',
            'max:12'
        ];
        $rules['password'] = [
            'nullable',
            'string',
            'min:6',
            'max:20'
        ];

        return $rules;
    }
}
