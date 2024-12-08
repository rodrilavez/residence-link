<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'residente_id',
        'propiedad_id',
        'descripcion',
        'estado',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class);
    }

    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class);
    }
}
