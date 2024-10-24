<?php

namespace App\Http\Requests\Api\Profissional;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalStoreRequest extends FormRequest
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
        return [
            "name" => [
                'required',
                "string",
                'min:6',
                'max:200'
            ],
            "cpf" => [
                'required',
                "string",
                "unique:profissionais"
                // adicionar validação CPF
            ],
            "email" => [
                "required",
                "email",
                "unique:profissionais"
            ],
            "data_nasc" => [
                "required",
                "date_format:Y-m-d"
            ],
            "logradouro" => [
                "required",
                "string",
                "min:6",
                "max:38"
            ],
            "bairro" => [
                "required",
                "string",
                "min:6",
                "max:20"
            ],
            "cep" => [
                "required",
                "string",
                "min:6",
                "max:9"
            ],
            "telefone" => [
                "nullable",
                "string",
                "max:10"
            ],
            "celular" => [
                "required",
                "string",
                'unique:profissionais'
                //adicionar validação celular
            ],
            "cnpj" => [
                "required",
                "string",
                "unique:profissionais"
                // adicionar validação
            ],
            "razao_social" => [
                "required",
                "string",
                "min:10",
                "max:200"
            ],
            "coren" => [
                "required",
                "string",
                "unique:profissionais",
                "min:5",
                "max:10"
            ]
        ];
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
            "unique" => ":attribute já cadastrado na plataforma, revise os dados por favor!",
            "min" => "O campo :attribute precisa de 6 caracteres",
            "max" => "O campo :attribute não suporte a quantidade de caracteres informada!",
            "email.email" => "Email não é valido!",
            "data_nasc.date_format" => "A data precisa estar formatada em Y-m-d"
        ];
    }
}
