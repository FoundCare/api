<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_paciente'

    ];

    protected $table = 'paciente';
}

