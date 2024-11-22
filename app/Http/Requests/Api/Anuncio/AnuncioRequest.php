<?php

namespace App\Http\Requests\Api\Anuncio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AnuncioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors()

        ],422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         // Valida os dados recebidos
    $validations =[
        'servicos' => 'required|string|max:255',
        'descricao' => 'required|string',
        'id_profissional' => 'required|integer|exists:profissionais,id_profissional'
    ];

        return $validations;
    }

    public function messages()
    {
        $messages=[
            "required" => "O campo :attribute é obrigatório",
            "string" => "O campo :attribute precisa ser um texto",

            'descricao.required' => 'O campo descrição é obrigatório.',
            'descricao.string' => 'O campo descrição deve ser um texto.',

            "id_profissional.integer" => "O campo :attribute precisa ser um número",
            "id_profissional.exists" => "O campo :attribute é inexistente",
            'id_profissional.required' => 'O campo ID do profissional é obrigatório.'
        ];

        return $messages;
    }
}
