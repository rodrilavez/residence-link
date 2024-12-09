<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tipo', 'descripcion', 'residente_id', 'amenidad_id'];
    protected $table = 'actividades';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function residente()
    {
        return $this->belongsTo(Residente::class);
    }

    public function amenidad()
    {
        return $this->belongsTo(Amenidad::class);
    }
}
