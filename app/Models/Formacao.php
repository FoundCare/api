<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'formacao',
        'descricao',
        'data_inicio',
        'data_termino',
        'token_certificado'

    ];

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'id_profissional');
    }
}
