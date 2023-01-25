<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaseMatricula extends Model
{
    use HasFactory;
    protected $table = 'clases_matricula';
    protected $fillable = [
        'clase_id',
        'matricula_id',
    ];

    public function clase()
    {
        return $this->belongsTo(Clase::class, 'clase_id');
    }
    public function matricula()
    {
        return $this->belongsTo(Matricula::class, 'matricula_id');
    }
}
