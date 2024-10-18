<?php

namespace App\Http\Requests\Api\Contato;

use App\Http\Requests\Api\Contato\ContatoRequest;

class ContatoEditRequest extends ContatoRequest
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
        $rules['celular'] = [
            'nullable',
            'max:15'
        ];
        return $rules;
    }
}
