<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // Adicione esta importação

class Anuncio extends Model
{
    use HasFactory;

    protected $fillable = [
        'servicos',
        'descricao',
        'id_profissional'

    ];
    protected $table = 'anuncios';  // Nome da tabela
    protected $primaryKey = 'id_anuncios';  // Coluna da chave primária

    // Definindo se a chave primária é auto-incrementada
    public $incrementing = true;

    public function historicoDeProfissionals(): HasMany
    {
        return $this->hasMany(HistoricoDeProfissional::class, 'id_anuncio');
    }

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class,'id_profissional');
    }


}
