<?php

namespace App\Http\Requests\Api\Especialidade;

use Illuminate\Foundation\Http\FormRequest;

class EspecialidadeUpdateRequest extends EspecialidadeRequest
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
        $validations = parent::rules();

        $validations['especialidade'] = [
            'nullable'
        ];

        $validations['comprovante'] = [
            'nullable',
            'unique:especialidades'
        ];
        return $validations;
    }
}
