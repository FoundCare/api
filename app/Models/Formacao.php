<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    protected $primaryKey = "id_formacao";

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'id_profissional');
    }

    //protected $table = 'formacao';//*

}
