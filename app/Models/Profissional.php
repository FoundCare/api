<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    protected $primaryKey = 'id_profissional';
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function anuncios(): HasMany
    {
        return $this->hasMany(Anuncio::class, 'id_profissional');
    }

    public function historicoDeProfissionals(): HasMany
    {
        return $this->hasMany(HistoricoDeProfissional::class, 'id_profissional');
    }

    public function especialidades(): HasMany
    {
        return $this->hasMany(Especialidade::class, "id_profissional");
    }

    public function formacoes(): HasMany
    {
        return $this->hasMany(Formacao::class, 'id_profissional');
    }

}
