<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HistoricoDeProfissional extends Model
{
    use HasFactory;

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class, "id_paciente");
    }

    public function anuncio(): BelongsTo
    {
        return $this->belongsTo(Anuncio::class, "id_anuncio");
    }

}
