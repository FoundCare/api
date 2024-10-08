<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profissional extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profissionais';

    protected $fillable = [
        'cnpj',
        'razao_social',
        'status_validacao',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Acessores para pegar dados do User diretamente
    public function getNameAttribute()
    {
        return $this->user->name;
    }

    public function getCpfAttribute()
    {
        return $this->user->cpf;
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

    public function getDataNascAttribute()
    {
        return $this->user->data_nasc;
    }
}
