<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $fillable = ['residente_id', 'descripcion'];

    public function residente()
    {
        return $this->belongsTo(Residente::class);
    }
} 