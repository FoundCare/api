<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Endereco extends Model
{
    use HasFactory;

    protected $fillable = [
        'logradouro',
        'bairro',
        'cep',
        'cidade',
        'estado'
    ];

    protected $hidden = [
        "id_endereco"
    ];

    /**
     * Relacionamento entre as tabelas
     * 
     * Get the user that owns the endereco
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
