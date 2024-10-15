<?php

namespace App\Http\Requests\Api\Especialidade;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EspecialidadeRequest extends FormRequest
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
            "comprovante" => [
                'required',
                'unique:especialidades'
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
            "unique" => ":attribute está incorreto, verifique seus dados e tente novamente!"
        ];
    }
}
