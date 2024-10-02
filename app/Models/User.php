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
        return $this->hasOne(Endereco::class, "id_endereco");
    }
    public function contatos(): HasOne
    {
        return $this->hasOne(Contato::class, "id_contato");
    }

    public function pacientes(): HasOne
    {
        return $this->hasOne(Paciente::class, "id_paciente");
    }

    public function profissional(): HasOne
    {
        return $this->hasOne(Profissional::class, "id_profissional");
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
        "id_endereco",
        "id_contato"
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'senha' => 'hashed',
        ];
    }
}
