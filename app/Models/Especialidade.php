<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'comprovante'
    ];


    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'id_profissional');
    } 
}
