<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissional extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Tabela associada ao modelo
     * 
     * @var string
     */
    protected $table = 'profissionais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpf',
        'email',
        'data_nasc',
        'logradouro',
        'bairro',
        'cep',
        'celular',
        'cnpj',
        'razao_social',
        'coren'
    ];

    public function competencias()
    {
        return $this->hasMany(Competencias::class);
    }

}
