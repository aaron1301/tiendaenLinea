<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = "calificacion";
    protected $fillable = ['usuario','articulo','valor'];
}
