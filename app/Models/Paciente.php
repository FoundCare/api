<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_usuario'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id_usuario',
        'id',
        'deleted_at',
        'senha',
        'remember_token',
        'id_endereco',
        'id_contato',
        'email_verified_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function historicoDeProfissionais(): HasMany
    {
        return $this->hasMany(HistoricoDeProfissional::class, "id_historico_profissional");
    }

}
