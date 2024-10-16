<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competencias extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_profissional',
        'competencia'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id_competencia'
    ];

    protected $primaryKey = 'id_competencia';

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);
    }
}
