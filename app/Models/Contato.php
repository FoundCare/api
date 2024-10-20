<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contato extends Model
{
    use HasFactory;

    /**
     * Relacionamentos da tabela
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $primaryKey = "id_contato";

    protected $fillable = [
        "celular",
        "telefone"
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];
}
