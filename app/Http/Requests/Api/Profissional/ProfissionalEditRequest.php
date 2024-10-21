<?php

namespace App\Http\Requests\Api\Profissional;

class ProfissionalEditRequest extends ProfissionalStoreRequest
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
        $rules = parent::rules();
        
        $rules['name'] = [
            'nullable',
            "string",
            'min:6',
            'max:200'
        ];
        $rules['cpf'] = [
            'nullable',
            "string",
            "unique:profissionais",
            "min:6",
            "max:11"
        ];
        $rules['email'] = [
            'nullable',
            'unique:profissionais',
            'email',
            'min:6'
        ];
        $rules['data_nasc'] = [
            'nullable',
            'date_format:Y-m-d',
            'min:6'
        ];
        $rules['logradouro'] = [
            'nullable',
            "string",
            'min:6'
        ];
        $rules['bairro'] = [
            'nullable',
            "string",
            'min:6'
        ];
        $rules['cep'] = [
            'nullable',
            "string",
            'min:6'
        ];
        $rules['telefone'] = [
            'nullable',
            "string",
            'min:6'
        ];
        $rules['celular'] = [
            'nullable',
            "string",
            'unique:profissionais',
            'min:6'
        ];
        $rules['cnpj'] = [
            'nullable',
            "string",
            'unique:profissionais',
            'min:6'
        ];
        $rules['razao_social'] = [
            'nullable',
            "string",
            'unique:profissionais',
            'min:6'
        ];
        $rules['coren'] = [
            'nullable',
            "string",
            'unique:profissionais',
            'min:6'
        ];
    
        return $rules;
    }
}
