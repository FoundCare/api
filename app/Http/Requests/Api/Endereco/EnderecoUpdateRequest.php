<?php

namespace App\Http\Requests\Endereco;

//use Illuminate\Foundation\Http\FormRequest;

class EnderecoUpdateRequest extends EnderecoRequest
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

        $rules['logradouro'] = [
            "nullable",
            "min:15",
            "max:250"
        ];
        $rules['bairro'] = [
            "nullable",
            "min:6",
            "max: 45"
        ];
        
        $rules["cep"] = [
            "nullable",
            "min:8",
            "max: 8"
        ];
        $rules["cidade"] = [
            "nullable",
            "min:6",
            "max: 25"
        ];
        
        $rules["estado"] = [
            "nullable",
            "min: 2",
            "max: 2"
        ];

        return $rules;
    }
}
