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
            'min:6',
            'max:200'
        ];
        $rules['cpf'] = [
            'nullable',
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
            'min:6'
        ];
        $rules['bairro'] = [
            'nullable',
            'min:6'
        ];
        $rules['cep'] = [
            'nullable',
            'min:6'
        ];
        $rules['telefone'] = [
            'nullable',
            'min:6'
        ];
        $rules['celular'] = [
            'nullable',
            'unique:profissionais',
            'min:6'
        ];
        $rules['cnpj'] = [
            'nullable',
            'unique:profissionais',
            'min:6'
        ];
        $rules['razao_social'] = [
            'nullable',
            'unique:profissionais',
            'min:6'
        ];
        $rules['coren'] = [
            'nullable',
            'unique:profissionais',
            'min:6'
        ];
    
        return $rules;
    }
}
