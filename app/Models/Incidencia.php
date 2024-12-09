<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion',
        'residente_id',
        'amenidad_id',
    ];

    public function residente()
    {
        return $this->belongsTo(Residente::class);
    }

    public function amenidad()
    {
        return $this->belongsTo(Amenidad::class);
    }
}
