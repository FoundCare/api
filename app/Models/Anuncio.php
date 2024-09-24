<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anuncio extends Model
{
    use HasFactory;

    public function historicoDeProfissionais(): HasMany
    {
        return $this->hasMany(HistoricoDeProfissional::class, "id_historico_profissional");
    }
}
