<?php

namespace App\Http\Requests\Endereco;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EnderecoRequest extends FormRequest
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
        $data = [
            'status' => false,
            'erros' => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($data, 422));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $validations = [
            "logradouro" => [
                "required",
                "min:15",
                "max:250"
            ],
            "bairro" => [
                "required",
                "min:6",
                "max: 45"
            ],
            "cep" => [
                "required",
                "min:8",
                "max: 8"
            ],
            "cidade" => [
                "required",
                "min:6",
                "max: 25"
            ],
            "estado" => [
                "required",
                "max: 2"
            ],
        ];
        
        return $validations;
    }

    public function messages()
    {
        $messages = [
            "required" => "Campo :attribute é obrigatório!",
            "min" => "O campo :attribute não atingiu o minimo de caracteres necessário!",
            "max" => "O campo :attribute atingiu o máximo de caracteres permitido!"
        ];

        return $messages;
    }
}
