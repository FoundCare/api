<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_experiencia';

    protected $fillable = [
       'empresa',
        'cargo',
        'data_inicio',
        'data_fim',
        'id_profissional',
        'descricao'
    ];
}
