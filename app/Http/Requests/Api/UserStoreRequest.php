<?php

namespace App\Http\Requests\Api;

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

        // Recupera o valor do id enviado na rota
        $this->route('user');
        
        return [
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255'
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
            "name.required" => "Campo nome é obrigatório!",
            "name.min" => "O campo nome precisa de 6 caracteres",
            "email.required" => "Campo email é obrigatório!",
            "email.email" => "Email não é valido!",
            "email.unique" => "Email já existente no banco de dados!",
            "password.required" => "Campo password é obrigatório!",
            "password.min" => "Campo senha precisa de no mínimo 6 caracteres",
        ];
    }
}
