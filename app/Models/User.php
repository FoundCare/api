<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Relacionamento com outras tabelas
     */
    public function enderecos(): HasOne
    {
        return $this->hasOne(Endereco::class, 'user_id'); // Foreign key padrão 'user_id'
    }

    public function contatos(): HasOne
    {
        return $this->hasOne(Contato::class, 'user_id'); // Foreign key padrão 'user_id'
    }

    public function pacientes(): HasOne
    {
        return $this->hasOne(Paciente::class, 'user_id'); // Foreign key padrão 'user_id'
    }

    public function profissional(): HasOne
    {
        return $this->hasOne(Profissional::class, 'user_id'); // Corrigido para 'user_id'
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'senha',
        'data_nasc',
        'cpf',
        'id_endereco',
        'id_contato'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ // Corrigido para $casts
        'email_verified_at' => 'datetime',
        'senha' => 'hashed',
    ];
}
