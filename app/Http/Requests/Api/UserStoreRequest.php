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
    
    public function messages(): array
    {
        return [
            "name.required" => "Campo nome é obrigatório!",
            "name.min" => "O campo nome precisa de 6 caracteres",
            "email.required" => "Campo email é obrigatório!",
            "email.email" => "Email não é valido!",
            "email.unique" => "Email já existente no banco de dados!",
            "password.required" => "Campo nome é obrigatório!"
        ];
    }
}
