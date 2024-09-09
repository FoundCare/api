<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    /**
     * Tabela associada ao modelo
     * 
     * @var string
     */
    protected $table = 'profissionais';
    
}
