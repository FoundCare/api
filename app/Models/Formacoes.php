<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'formacao',
        'descricao',
        'data_inicio',
        'data_termino',
        'token_certificado'

    ];
}
