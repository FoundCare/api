<?php

namespace App\Http\Requests\Experiencia;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExperienciaRequest extends FormRequest
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
        $rules = [
            'empresa' => [
                'required',
                'max:80',
                'string'
            ],
            'cargo' => [
                'required',
                'string'
            ],
            'data_inicio' => [
                'required',
                'date_format:Y-m-d'
            ],
            'data_fim' => [
                'nullable',
                'date_format:Y-m-d'
            ],
            'descricao' => [
                'nullable',
                'string'
            ]
        ]; 

        return $rules;
    }

    public function messages(): array
    {
        $messages = [
            "required" => "O campo :attribute é um campo obrigatório",
            "max" => "O campo :attribute atingiu seu limite de caracteres",
            "unique" => ":attribute indisponível!"
        ];

        return $messages;
    }
}
