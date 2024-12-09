<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';

    protected $fillable = [
        'zona_id',
        'nombre',
        'descripcion',
        'es_amenidad',
        'direccion',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }

    public function residente()
    {
        return $this->hasOne(Residente::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
