<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    public function jornadas(){
        return $this->belongsToMany(Jornada::class, 'jornada_nivel');
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class, 'grupo_nivel');
    }
}
