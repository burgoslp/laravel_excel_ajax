<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    

    protected $fillable=['cedula','nombre','apellido','estado','unidad','votacion'];
}
