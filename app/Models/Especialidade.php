<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Especialidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_profissional',
        'especialidade',
        'comprovante'
    ];

    protected $hidden = [
        "created_at",
        "updated_at",
        "id_profissional",
        "id_especialidade"
    ];

    protected $primaryKey = "id_especialidade";

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'id_profissional');
    } 
}
