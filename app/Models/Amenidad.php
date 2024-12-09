<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Amenidad extends Model
{
    protected $table = 'amenidades';
    protected $fillable = ['nombre', 'descripcion', 'zona_id'];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
