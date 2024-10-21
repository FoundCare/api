<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserStoreRequest extends FormRequest
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
            "nome" => [
                'required',
                'string',
                'min:6',
                'max:250'
            ],
            "email" => [
                'required',
                'email',
                'max:250',
                'unique:users'
            ],
            "senha" => [
                'required',
                'string',
                'min:6',
                'max:30'
            ],
            'data_nasc' => [
                'required',
                'date_format:Y-m-d'
            ],
            'cpf' => [
                'required',
                'string',
                'unique:users',
                'max:12'
            ]
        ];

        return $validations;
    }
    
    /**
     * Este método está responsável por enviar as mensagens de erro personalizadas
     * para os solicitantes da API.
     * 
     * @return array<string>;
     */
    public function messages(): array
    {
        return [
            "required" => "Campo :attribute é obrigatório!",
            "min" => "O campo :attribute precisa de 6 caracteres",
            "email.email" => "Email não é valido!",
            "max" => "Máximo de caracteres atingido no campo :attribute",
            "unique" => ":attribute já existente no banco de dados, verifique os dados e tente novamente!",
            "date_format" => "Formato da data está incorreto, tente Ano-mês-dia"
        ];
    }
}
