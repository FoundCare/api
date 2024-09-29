<?php

namespace App\Http\Requests\Contato;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Este método é responsável por manipular as falhas de validação e retorna uma resposta JSON com os erros de validação
     * 
     * @param Illuminate\Contracts\Validation\Validator;
     * @throws Illuminate\Http\Exceptions\HttpResponseException;;
     * @return status 422 - "Unprocessable Entity"
     *
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors()
        ], 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $validations = [
            "telefone" => [
                "nullable",
                "max:15"
            ],
            "celular" => [
                "required",
                "max:15"
            ]
        ];

        return $validations;
    }

    public function messages(): array
    {
        $messages = [
            "required" => "O campo :attribute é um campo obrigatório",
            "max" => "O campo :attribute atingiu seu limite de caracteres"
        ];

        return $messages;
    }
}
