<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'area_id',
        'descripcion',
        'creditos',
        'tipo_asignatura',
        'estado',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
