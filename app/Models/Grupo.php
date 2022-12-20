<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function niveles(){
        return $this->HasMany(Nivel::class);
    }

    public function departamentos(){
        return $this->belongsToMany(Departamento::class);
    }
}
