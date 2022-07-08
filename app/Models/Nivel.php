<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    use HasFactory;

    public function departamentos(){
        return $this->belongsToMany(Deparmamento::class, 'departamento_nivel');
    }

    public function grupos(){
        return $this->belongsTo(Grupo::class);
    }

}
