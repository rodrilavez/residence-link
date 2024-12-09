<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserva;

class Amenidad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion'];

    protected $table = 'amenidades';

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
}
